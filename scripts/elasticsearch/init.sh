curl -XDELETE http://localhost:9200/es-culture
curl -XPUT http://localhost:9200/es-culture
curl -XPOST http://localhost:9200/es-culture/product/_mapping -d'
{
    "product": {
            "_all": {
            "index": "not_analyzed",
            "search_analyzer": "ik_smart",
            "term_vector": "no",
            "store": "false"
        },
        "properties": {
            "title": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "area_display": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "cate_name": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "sub_cate_name_xiju": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "sub_cate_name_yinyue": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "sub_cate_name_meishu": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "sub_cate_name_quyi": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "troupe": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "example": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "awards": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "band": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "figures": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "performer": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "artist": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "agency": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "re_batch": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "re_name": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "re_sex": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "prot_projects": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "ba_name": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            },
            "publish_agency": {
                "type": "string",
                "store": "no",
                "term_vector": "with_positions_offsets",
                "index_analyzer": "ik_smart",
                "search_analyzer": "ik_smart",
                "include_in_all": "true",
                "boost": 8
            }
        }
    }
}'
