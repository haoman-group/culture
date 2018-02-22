import MySQLdb

DB_CONFIG = {'host':'127.0.0.1', 'port':8889, 'user':'root', 'passwd':'123456', 'db':'zhuangtu', 'charset' : 'utf8'}

def find_area(curs, pid):
    ret = {}
    curs.execute('select * from zt_area where pid = %d' % pid)
    all_rows = curs.fetchall()
    for row in all_rows:
        ret[row[2].encode(encoding="utf-8")] = find_area(curs, row[0])
    return ret

# 

if __name__ == '__main__':
    conn = MySQLdb.connect(**DB_CONFIG)
    curs = conn.cursor()
    ret = find_area(curs, 1)
    for i1, k1 in enumerate(ret.keys()):
        v1 = ret[k1]
        id1 = (i1+1)*1000000
        print "('%d', '%d', '%s', '1000000', '0', '%s')," % (id1, 1, k1, k1)
        for i2, k2 in enumerate(v1.keys()):
            v2 = v1[k2]
            id2 = id1 + (i2+1)*10000
            print "('%d', '%d', '%s', '10000', '0', '%s')," % (id2, id1, k2, k1+'-'+k2)
            for i3, k3 in enumerate(v2.keys()):
                v3 = v2[k3]
                id3 = id2 + (i3+1)*100
                print "('%d', '%d', '%s', '100', '0', '%s')," % (id3, id2, k3, k1+'-'+k2+'-'+k3)
