<?php

use Phpmig\Migration\Migration;

class InsertToCalendar extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_festival_calendar` VALUES
(1, '艺术节开幕式', '山西大剧院', 1502985600, 1502985900, 'event-success', 1501583237, 1501583237),
(3, '太原市晋剧艺术研究院 晋剧《布衣于成龙》', '青年宫演艺中心', 1502985600, 1503072000, 'event-success', 1501585647, 1501585647),
(4, '太原市话剧团 话剧《谍杀》', '太原工人文化宫', 1502985600, 1503072000, 'event-important', 1501585724, 1501585724),
(5, '《喝彩山西》—山西籍文艺名家演唱会', '山西大剧院', 1503158400, 1503158400, 'event-info', 1501585815, 1501585815),
(6, '山西省曲艺团 小剧场戏剧《爱呦》', '星光剧场', 1503158400, 1503244800, 'event-info', 1501586231, 1501586231),
(7, '太原市晋剧艺术研究院 晋剧《清风亭》', '山西大剧院小剧场', 1503158400, 1503244800, 'event-inverse', 1501586292, 1501586292),
(8, '阳泉市盂县晋剧团 晋剧《木兰从军》', '青年宫演艺中心', 1503244800, 1503331200, 'event-special', 1501586322, 1501586322),
(9, '太原市实验晋剧院有限责任公司    晋剧《烂柯山下》*', '太原工人文化宫', 1503331200, 1503417600, 'event-important', 1501586536, 1501586536);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "TRUNCATE `cu_festival_calendar`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}