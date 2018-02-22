#!/usr/bin/env python
# -*- coding: utf-8 -*-
import MySQLdb
import datetime

#DB_CONFIG = {"host": "127.0.0.1", "port": 3306, "user": "culture", "passwd": "culture", "db": "culture", "charset":"utf8"}
DB_CONFIG = {"host": "192.168.100.21", "port": 3306, "user": "culture", "passwd": "Ha0man2017", "db": "culture", "charset":"utf8"}


class Statistics:
    def __init__(self, **dbconfig):
        self.conn = MySQLdb.connect(**dbconfig)
        self.curs = self.conn.cursor()
        self.curs.execute(""" SELECT cid, parent_cid FROM cu_art_category WHERE status = 0 and parent_cid != 0;""")
        self.category = {}
        self.current_time = datetime.datetime.now().strftime("%Y-%m-%d %H:00:00")
        for item in self.curs.fetchall():
            self.category[item[0]] = item[1]

    def __del__(self):
        self.curs.close()
        self.conn.close()

    def get_from_db(self, query):
        try:
            self.curs.execute(query)
            data = self.curs.fetchall()
        except Exception, e:
            print str(e)
            data = []
        return data

    def get_update_data(self, data):
        aggregate = {}
        detail = {}
        for item in data:
            cid, area, level, represent, number = item
            aggregate.setdefault(cid, 0)
            aggregate[cid] += number
            detail_key = ','.join([str(cid), str(area), level.encode(encoding="utf-8"), str(represent)])
            detail.setdefault(detail_key, 0)
            detail[detail_key] += number
            # search for parent category
            while self.category.has_key(cid):
                cid = self.category[cid]
                aggregate.setdefault(cid, 0)
                aggregate[cid] += number
                detail_key = ','.join([str(cid), str(area), level.encode(encoding="utf-8"), str(represent)])
                detail.setdefault(detail_key, 0)
                detail[detail_key] += number

        # convert result from dict to list
        re_aggregate = [(cid, number) for cid, number in aggregate.iteritems()]
        re_detail = []
        for detail_key, number in detail.iteritems():
            re_detail.append(detail_key.split(',') + [number])
        return re_aggregate, re_detail

    def update_category_table(self, data):
        queries = ["UPDATE cu_art_category SET total_num = %d WHERE cid = %d" % (number, cid) for cid, number in data]
        for query in queries:
            self.curs.execute(query)
        self.conn.commit()

    def insert_statistic_table(self, data):
        query = "INSERT INTO cu_category_statistics (cid, area, total_num, addtime, level, represent) VALUES (%s, %s, %s, %s, %s, %s)"
        history_query = "INSERT INTO cu_category_statistics_history (cid, area, total_num, addtime, level, represent) VALUES (%s, %s, %s, %s, %s, %s)"
        try:
            args = [(cid, area, number, self.current_time, level, represent) for cid, area, level, represent, number in data]
            if args:
                self.curs.executemany(query, args)
                self.curs.executemany(history_query, args)
                self.conn.commit()
        except Exception, e:
            self.conn.rollback()
            print str(e)

    def run(self, query):
        origin_data = self.get_from_db(query)
        full_data, full_data_with_area = self.get_update_data(origin_data)
        self.update_category_table(full_data)
        self.insert_statistic_table(full_data_with_area)

    def clean_data(self):
        # 清理数据
        try:
            self.curs.execute("truncate cu_category_statistics;")
            self.curs.execute("update cu_art_category set total_num = 0;")
            self.curs.execute("delete from cu_category_statistics_history where addtime='%s';" % (self.current_time))
            self.conn.commit()
        except Exception, e:
            self.conn.rollback()
            print str(e)


if __name__ == "__main__":
    statistics = Statistics(**DB_CONFIG)
    statistics.clean_data()
    # 文化艺术
    statistics.run("select art_cid, area, '' as level, 0 as represent, count(1) as number from cu_re_culture where isdelete = 0 and auditstatus = 35 group by art_cid, area;")
    # 公共文化 
    statistics.run("select 43, area, level, 0 as represent, count(1) from cu_library where isdelete = 0 and auditstatus = 35 group by area, level union select 44, area, level, 0 as represent, count(1) from cu_comartcenter where isdelete = 0 and auditstatus=35 group by area, level")
    # 非物质文化遗产
    statistics.run("select art_cid, area, level, re_represen, count(1) from cu_immaterial where isdelete = 0 and auditstatus = 35 group by art_cid, area, level, re_represen")

    # 非物质文化遗产 -> 文化生态保护区
#    protection_area_data = statistics.get_from_db("select art_cid, area, level, re_represen, count(1) from cu_immaterial where art_cid = 76 and isdelete = 0 and auditstatus = 35 and level = '国家级'")
#    tmp = []
#    for d in protection_area_data:
#        if d[-1] > 0:
#            tmp.append([105] + list(d[1:]))
#    protection_area_data = statistics.get_from_db("select art_cid, area, level, re_represen, count(1) from cu_immaterial where art_cid = 76 and isdelete = 0 and auditstatus = 35 and level = '省级'")
#    for d in protection_area_data:
#        if d[-1] > 0:
#            tmp.append([106] + list(d[1:]))
#    statistics.insert_statistic_table(tmp)
#
#    # 非物质文化遗产 -> 生产性保护示范基地
#    demonstration_base_data = statistics.get_from_db("select art_cid, area, level, re_represen, count(1) from cu_immaterial where art_cid = 77 and isdelete = 0 and auditstatus = 35 and level = '国家级'")
#    tmp = []
#    for d in demonstration_base_data:
#        if d[-1] > 0:
#            tmp.append([111] + list(d[1:]))
#    demonstration_base_data = statistics.get_from_db("select art_cid, area, level, re_represen, count(1) from cu_immaterial where art_cid = 77 and isdelete = 0 and auditstatus = 35 and level = '省级'")
#    for d in demonstration_base_data:
#        if d[-1] > 0:
#            tmp.append([112] + list(d[1:]))
#    demonstration_base_data = statistics.get_from_db("select art_cid, area, level, re_represen, count(1) from cu_immaterial where art_cid = 77 and isdelete = 0 and auditstatus = 35 and level = '市级'")
#    for d in demonstration_base_data:
#        if d[-1] > 0:
#            tmp.append([113] + list(d[1:]))
#    statistics.insert_statistic_table(tmp)

    # 文化产业
    statistics.run("select art_cid, area, '' as level, 0 as represent, count(1) from cu_industry where isdelete = 0 and auditstatus = 35 group by art_cid, area")
    # 文化政策
    statistics.run("select art_cid, area, '' as level, 0 as represent, count(1) from cu_policy_culture where isdelete = 0 and auditstatus = 35 group by art_cid, area")
