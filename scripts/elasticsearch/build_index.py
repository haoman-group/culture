# -*- coding:utf-8 -*-
from elasticsearch import Elasticsearch
import sys
import MySQLdb
import getopt
import re

defaultencoding = 'utf-8'
if sys.getdefaultencoding() != defaultencoding:
    reload(sys)
    sys.setdefaultencoding(defaultencoding)

ELK_CONFIG = [{'host':'localhost', 'port':9200}]
#DB_CONFIG = {
#	'host': 'localhost',
#	'port': 3306,
#	'user': 'culture',
#	'passwd': 'culture',
#	'db': 'culture',
#	'charset': 'utf8'
#}
DB_CONFIG = {
	'host': '192.168.100.21',
	'port': 3306,
	'user': 'culture',
	'passwd': 'Ha0man2017',
	'db': 'culture',
	'charset': 'utf8'
}

def index_table(curs, es, sql, table_name):
    curs.execute(sql)
    results = curs.fetchall()

    for row in results:
    	try:
    		es.index(index='es-culture', doc_type='product', id=table_name+str(row['id']), body=row)
    	except Exception, e:
    		print str(e)
    		print '''Id %s in table %s can't be inserted into elasticsearch!''' % (row['id'], table_name)


if __name__ == '__main__':
	try:
		options, args = getopt.getopt(sys.argv[1:], 'u:', ['update-time=',])
	except Exception, e:
		print str(e)
		sys.exit()

	es = Elasticsearch(ELK_CONFIG)
	conn = MySQLdb.connect(**DB_CONFIG)
	curs = conn.cursor(MySQLdb.cursors.DictCursor)

	sql_for_reculture = '''
	select crc.id as id
        , crc.area_display as area_display
        , crc.art_cid as art_cid
        , cac.name as cate_name
        , crc.addtime as addtime
        , crc.auditstatus as auditstatus
        , crc.isdelete as isdelete

        , (case when crc.drama between 262 and 327 then cac2.name else "" end) as sub_cate_name_xiju
        , (case when crc.drama in (20,21,22,23,24,26,27,28,29,30) then cac2.name else "" end) as sub_cate_name_yinyue
        , (case when crc.drama in (37, 40,41,42,45,46,62) then cac2.name else "" end) as sub_cate_name_meishu
        , (case when crc.drama in (82,83,84) then cac2.name else "" end) as sub_cate_name_quyi
        , crc.troupe as troupe
        , crc.awards as awards
        , crc.example as example

        , crc.unit as unit
        , crc.figures as figures

        , crc.performer as performer
        , crc.agency as agency

        , crc.authorname as authorname
        , crc.theme as theme
        , crc.technique as technique
        , crc.artist as artist
    from cu_re_culture crc
    join cu_art_category cac on crc.art_cid = cac.cid
    left join cu_art_category cac2 on crc.drama = cac2.cid
	'''
	index_table(curs, es, sql_for_reculture, "reculture")

	sql_for_immaterial = '''
	select ci.id as id
	    , ci.re_projectname as title
	    , ci.area_display as area_display
	    , ci.art_cid as art_cid
	    , cac.name as cate_name
	    , ci.addtime as addtime
	    , ci.auditstatus as auditstatus
	    , ci.isdelete as isdelete

	    , ci.level as level
	    , ci.re_projectname as re_projectname
	    , ci.re_represen as represen
	    , ci.re_itemnum as re_itemnum
	    , ci.re_unit as re_unit
	    , ci.re_directorytime as re_directorytime
	    , ci.re_batch as re_batch
	    , ci.re_protectunit as re_protectunit

	    , ci.re_name as re_name
	    , ci.re_nation as re_nation
	    , ci.re_birth as re_birth
	    , DATEDIFF(CURDATE(), ci.re_birth) div 365 as age
	    , ci.re_belongunit as re_belongunit

	    , ci.prot_survey as prot_survey
	    , ci.prot_rule as prot_rule
	    , ci.prot_method as prot_method
	    , ci.prot_topic as prot_topic
	    , ci.prot_projects as prot_projects
	    , ci.prot_center as prot_center

	    , ci.prot_zone as prot_zone

	    , ci.ba_name as ba_name
	    , ci.ba_introduction as ba_introduction
	    , ci.ba_creattime as ba_creattime

	    , ci.me_plan as me_plan
	    , ci.me_manual as me_manual
	    , ci.me_list as me_list
	    , ci.me_more as me_more

	    , ci.me_typical as me_typical
	    , ci.me_exchange as me_exchange
	    , ci.me_media as me_media

	    , ci.sh_name as sh_name
	    , ci.sh_building as sh_building
	    , ci.sh_situation as sh_situation
	    , ci.sh_content as sh_content
	    , ci.sh_key as sh_key
	    , ci.sh_actcontent as sh_actcontent

     from cu_immaterial ci
     join cu_art_category cac on ci.art_cid = cac.cid
	'''
	index_table(curs, es, sql_for_immaterial, "immaterial")

	sql_for_industry = '''
	select ci.id as id
	    , ci.title as title
	    , ci.area_display as area_display
	    , ci.art_cid as art_cid
	    , cac.name as cate_name
	    , ci.addtime as addtime
	    , ci.auditstatus as auditstatus
	    , ci.isdelete as isdelete

	    , ci.com_name as com_name
	    , ci.com_property as com_property
	    , ci.com_leader as com_leader
	    , ci.com_phone as com_phone
	    , ci.com_addr as com_addr
	    , ci.com_product as com_product
	    , ci.com_mode as com_mode

	    , ci.support as support
	    , ci.inv_totlemoney as inv_totle
	    , ci.inv_financing as inv_financing
	    , ci.inv_years as inv_years
	    , ci.inv_type as inv_type
	    , ci.inv_use as inv_use

	    , ci.specification as specification

	    , ci.level as level
	    , ci.intro as intro

	    , ci.sponsor as sponsor
	    , ci.undertaker as undertaker
	    , ci.pavilion as pavilion
	    , ci.opentime as opentime
	    , ci.addr as addr

	    , ci.completetime as completetime
	    , ci.boutique as boutique
	    , ci.total_area as total_area
    from cu_industry ci
    join cu_art_category cac on ci.art_cid = cac.cid
	'''
	index_table(curs, es, sql_for_industry, "industry")

	sql_for_policyculture = '''
	select cpc.id as id
	    , cpc.publish_name as title
	    , cpc.area_display as area_display
	    , cpc.art_cid as art_cid
	    , cac.name as cate_name
	    , cpc.addtime as addtime
	    , cpc.auditstatus as auditstatus
	    , cpc.isdelete as isdelete

	    , cpc.publish_name as publish_name
	    , cpc.publish_order as publish_order
	    , cpc.publish_agency as publish_agency
	    , cpc.publish_date as publish_date
	    , cpc.publish_topword as publish_topword
    from cu_policy_culture cpc
    join cu_art_category cac on cpc.art_cid = cac.cid
	'''
	index_table(curs, es, sql_for_policyculture, "policyculture")

	sql_for_library = '''
	select cl.id as id
	    , cl.name as title
	    , cl.area_display as area_display
	    , 43 as art_cid
	    , "图书馆" as cate_name
	    , cl.addtime as addtime
	    , cl.auditstatus as auditstatus
	    , cl.isdelete as isdelete

	    , cl.name as name
        , cl.addr as addr
        , cl.legal_person as legal_person
        , cl.telephone as telephone
        , cl.covered_area as covered_area
        , cl.floor_area as floor_area
        , cl.book_area as book_area
        , cl.readroom_area as readroom_area
        , cl.readroom_seat_num as readroom_seat_num
        , cl.chilreadroom_seat_num as chilreadroom_seat_num
        , cl.reportroom_area as reportroom_area
        , cl.reportroom_seat_num as reportroom_seat_num
        , cl.ereadroom_area as ereadroom_area
        , cl.ereadroom_seat_num as ereadroom_seat_num
        , cl.computer_num as computer_num
        , cl.reader_user_num as reader_user_num
        , cl.have_wifi as have_wifi
        , cl.computer_info_node as computer_info_node
        , cl.bandwidth as bandwidth
        , cl.storage as storage

        , cl.num_totle as num_totle
        , cl.num_e_doc as num_e_doc
        , cl.num_e_book as num_e_book
        , cl.num_e_periodical as num_e_periodical
        , cl.num_collect_book as num_collect_book
        , cl.num_collect_periodical as num_collect_periodical
        , cl.num_collect_audio as num_collect_audio
        , cl.num_digit_totle as num_digit_totle
        , cl.num_digit_self as num_digit_self


    from cu_library cl
	'''
	index_table(curs, es, sql_for_library, "library")

	sql_for_comartcenter = '''
	select cc.id as id
	    , cc.cac_name as title
	    , cc.area_display as area_display
	    , 44 as art_cid
	    , "群艺馆" as cate_name
	    , cc.addtime as addtime
	    , cc.auditstatus as auditstatus
	    , cc.isdelete as isdelete

    from cu_comartcenter cc
	'''
	index_table(curs, es, sql_for_comartcenter, "comartcenter")

	curs.close()
	conn.close()
