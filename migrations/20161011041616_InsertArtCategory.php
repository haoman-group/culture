<?php

use Phpmig\Migration\Migration;

class InsertArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="truncate table `cu_art_category`;  INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`) VALUES
(1, 0, '文化艺术', '0', 0, '1476093405', 0, 1, 0),
(2, 0, '公共文化', '0', 0, '1476093416', 0, 1, 0),
(3, 0, '非物质文化遗产', '0', 0, '1476093431', 0, 1, 0),
(4, 0, '文化产业', '0', 0, '1476093449', 0, 1, 0),
(5, 0, '文化政策', '0', 0, '1476152307', 0, 1, 0),
(6, 1, '艺术门类', '0', 0, '1476251637', 0, 1, 0),
(7, 6, '戏剧', '0', 0, '1476251630', 0, 1, 1),
(8, 6, '音乐', '0', 0, '1476094903', 0, 1, 1),
(9, 6, '舞蹈', '0', 0, '1476094922', 0, 1, 1),
(10, 6, '美术', '0', 0, '1476094937', 0, 1, 1),
(11, 6, '曲艺', '0', 0, '1476094958', 0, 1, 1),
(12, 6, '杂技', '0', 0, '1476094974', 0, 1, 1),
(13, 6, '书法', '0', 0, '1476094993', 0, 1, 1),
(14, 7, '戏曲', '0', 0, '1476156693', 0, 0, 0),
(15, 7, '话剧', '0', 0, '1476156787', 0, 0, 0),
(16, 7, '舞剧', '0', 0, '1476156793', 0, 0, 0),
(17, 7, '儿童剧', '0', 0, '1476156801', 0, 0, 0),
(18, 7, '音乐剧', '0', 0, '1476156805', 0, 0, 0),
(19, 8, '歌曲', '0', 0, '1476148736', 0, 1, 0),
(20, 19, '山歌类', '0', 0, '1476156857', 0, 0, 0),
(21, 19, '小调类', '0', 0, '1476156900', 0, 0, 0),
(22, 19, '号子类', '0', 0, '1476156911', 0, 0, 0),
(23, 19, '秧歌类', '0', 0, '1476156922', 0, 0, 0),
(24, 19, '套曲类', '0', 0, '1476156887', 0, 0, 0),
(25, 8, '器乐', '0', 0, '1476148862', 0, 1, 0),
(26, 25, '鼓吹乐', '0', 0, '1476157238', 0, 0, 0),
(27, 25, '吹打乐', '0', 0, '1476157242', 0, 0, 0),
(28, 25, '丝竹乐', '0', 0, '1476157250', 0, 0, 0),
(29, 25, '锣鼓乐', '0', 0, '1476157257', 0, 0, 0),
(30, 25, '宗教音乐', '0', 0, '1476157263', 0, 0, 0),
(31, 9, '古典舞', '0', 0, '1476157278', 0, 0, 0),
(32, 9, '芭蕾舞', '0', 0, '1476157286', 0, 0, 0),
(33, 9, '民族舞', '0', 0, '1476157292', 0, 0, 0),
(34, 9, '民间舞', '0', 0, '1476157299', 0, 0, 0),
(35, 9, '现代舞', '0', 0, '1476157308', 0, 0, 0),
(36, 10, '绘画', '0', 0, '1476149089', 0, 1, 0),
(37, 10, '雕塑', '0', 0, '1476157369', 0, 0, 0),
(38, 10, '工艺美术', '0', 0, '1476157376', 0, 0, 0),
(39, 10, '建筑', '0', 0, '1476157383', 0, 0, 0),
(40, 36, '中国画', '0', 0, '1476157332', 0, 0, 0),
(41, 36, '油画', '0', 0, '1476157336', 0, 0, 0),
(42, 36, '版画', '0', 0, '1476157340', 0, 0, 0),
(43, 2, '优秀传统文化', '0', 0, '1476148829', 0, 1, 0),
(44, 2, '当地先进文化', '0', 0, '1476148829', 0, 1, 0),
(45, 36, '水彩画', '0', 0, '1476157343', 0, 0, 0),
(46, 36, '连环画', '0', 0, '1476157348', 0, 0, 0),
(47, 43, '山西地方戏曲', '0', 0, '1476148829', 0, 0, 0),
(48, 43, '山西民间曲艺', '0', 0, '1476148829', 0, 0, 0),
(49, 43, '山西民间舞蹈', '0', 0, '1476148829', 0, 0, 0),
(50, 43, '山西民间音乐', '0', 0, '1476148829', 0, 0, 0),
(51, 43, '山西民歌', '0', 0, '1476148829', 0, 0, 0),
(52, 43, '山西传统手工技艺', '0', 0, '1476148829', 0, 0, 0),
(53, 43, '山晋历史文化名人', '0', 0, '1476148829', 0, 0, 0),
(54, 43, '山西民俗文化', '0', 0, '1476148829', 0, 0, 0),
(55, 43, '山西古代战争文化', '0', 0, '1476148829', 0, 0, 0),
(56, 43, '晋商文化', '0', 0, '1476148829', 0, 0, 0),
(57, 43, '山西红色文化', '0', 0, '1476148829', 0, 0, 0),
(58, 43, '山西关公文化', '0', 0, '1476148829', 0, 0, 0),
(59, 43, '山西根组文化', '0', 0, '1476148829', 0, 0, 0),
(60, 43, '山西佛教文化', '0', 0, '1476148829', 0, 0, 0),
(61, 43, '山西传统养生文化', '0', 0, '1476148829', 0, 0, 0),
(62, 36, '年画', '0', 0, '1476157352', 0, 0, 0),
(63, 44, '山西创业文化', '0', 0, '1476148829', 0, 0, 0),
(64, 44, '山西山水文化', '0', 0, '1476148829', 0, 0, 0),
(65, 44, '山西当地名人', '0', 0, '1476148829', 0, 0, 0),
(66, 44, '山西煤文化', '0', 0, '1476148829', 0, 0, 0),
(67, 44, '山西现代工艺文化', '0', 0, '1476148829', 0, 0, 0),
(68, 44, '山西现代工艺文化', '0', 0, '1476148829', 0, 0, 0),
(69, 44, '文源讲坛', '0', 0, '1476148829', 0, 0, 0),
(70, 44, '山西群众文化艺术', '0', 0, '1476148829', 0, 0, 0),
(71, 11, '鼓书类', '0', 0, '1476157399', 0, 0, 0),
(72, 11, '弦书类', '0', 0, '1476157406', 0, 0, 0),
(73, 11, '板诵类', '0', 0, '1476150027', 0, 1, 0),
(74, 11, '相声', '0', 0, '1476157442', 0, 0, 0),
(75, 3, '代表性项目及代表性传承人', '0', 0, '1476148829', 0, 0, 0),
(76, 3, '文化生态保护区', '0', 0, '1476148829', 0, 0, 0),
(77, 3, '生产性保护示范基地', '0', 0, '1476148829', 0, 0, 0),
(78, 3, '乡村文化记忆工程', '0', 0, '1476148829', 0, 0, 0),
(79, 3, '非遗展示', '0', 0, '1476148829', 0, 0, 0),
(80, 11, '曲艺小品', '0', 0, '1476157446', 0, 0, 0),
(81, 11, '表演唱', '0', 0, '1476157450', 0, 0, 0),
(82, 73, '快板书', '0', 0, '1476157419', 0, 0, 0),
(83, 73, '数来宝', '0', 0, '1476157423', 0, 0, 0),
(84, 73, '莲花落', '0', 0, '1476157428', 0, 0, 0),
(85, 75, '民间文学', '0', 0, '1476148829', 0, 0, 0),
(86, 75, '传统音乐', '0', 0, '1476148829', 0, 0, 0),
(87, 75, '传统舞蹈', '0', 0, '1476148829', 0, 0, 0),
(88, 75, '传统戏剧', '0', 0, '1476148829', 0, 0, 0),
(89, 75, '曲艺', '0', 0, '1476148829', 0, 0, 0),
(90, 75, '传统体育、游艺与杂技', '0', 0, '1476148829', 0, 0, 0),
(91, 75, '传统美术', '0', 0, '1476148829', 0, 0, 0),
(92, 75, '传统技艺', '0', 0, '1476148829', 0, 0, 0),
(93, 75, '传统医药', '0', 0, '1476148829', 0, 0, 0),
(94, 75, '民俗', '0', 0, '1476148829', 0, 0, 0),
(95, 12, '顶', '0', 0, '1476157461', 0, 0, 0),
(96, 12, '吊', '0', 0, '1476157468', 0, 0, 0),
(97, 12, '口', '0', 0, '1476157475', 0, 0, 0),
(98, 12, '蹬', '0', 0, '1476157483', 0, 0, 0),
(99, 12, '耍花坛', '0', 0, '1476157496', 0, 0, 0),
(100, 12, '走钢丝', '0', 0, '1476157503', 0, 0, 0),
(101, 12, '爬', '0', 0, '1476157517', 0, 0, 0),
(102, 12, '转', '0', 0, '1476157524', 0, 0, 0),
(103, 13, '篆书', '0', 0, '1476157534', 0, 0, 0),
(104, 13, '隶书', '0', 0, '1476157540', 0, 0, 0),
(105, 76, '国家级', '0', 0, '1476148829', 0, 0, 0),
(106, 76, '省级', '0', 0, '1476148829', 0, 0, 0),
(107, 13, '楷书', '0', 0, '1476157545', 0, 0, 0),
(108, 13, '行书', '0', 0, '1476157550', 0, 0, 0),
(109, 13, '草书', '0', 0, '1476157554', 0, 0, 0),
(110, 105, '晋中文化生态保护实验区', '0', 0, '1476148829', 0, 0, 0),
(111, 77, '国家级', '0', 0, '1476148829', 0, 0, 0),
(112, 77, '省级', '0', 0, '1476148829', 0, 0, 0),
(113, 77, '市级', '0', 0, '1476148829', 0, 0, 0),
(114, 78, '试点工作', '0', 0, '1476148829', 0, 1, 0),
(115, 78, '典型经验交流', '0', 0, '1476148829', 0, 0, 0),
(116, 78, '宣传推广活动', '0', 0, '1476148829', 0, 0, 0),
(117, 79, '展示传习点', '0', 0, '1476148829', 0, 1, 0),
(118, 79, '展示活动', '0', 0, '1476148829', 0, 1, 0),
(119, 4, '企业名录', '0', 0, '1476148829', 0, 1, 0),
(120, 4, '产业项目', '0', 0, '1476148829', 0, 1, 0),
(121, 4, '文化产品', '0', 0, '1476148829', 0, 1, 0),
(122, 4, '园区基地', '0', 0, '1476148829', 0, 1, 0),
(123, 4, '会展服务', '0', 0, '1476148829', 0, 1, 0),
(124, 114, '第一批', '0', 0, '1476148829', 0, 0, 0),
(125, 114, '第二批', '0', 0, '1476148829', 0, 0, 0),
(126, 117, '展示馆', '0', 0, '1476148829', 0, 0, 0),
(127, 117, '传习点', '0', 0, '1476148829', 0, 0, 0),
(128, 117, '工作室', '0', 0, '1476148829', 0, 0, 0),
(129, 118, '遗产日活动', '0', 0, '1476148829', 0, 0, 0),
(130, 118, '节庆活动', '0', 0, '1476148829', 0, 0, 0),
(131, 118, '大型展示会', '0', 0, '1476148829', 0, 0, 0),
(132, 119, '新闻出版发行服务', '0', 0, '1476148829', 0, 0, 0),
(133, 119, '广播电视电影服务', '0', 0, '1476148829', 0, 0, 0),
(134, 119, '文化艺术服务', '0', 0, '1476148829', 0, 0, 0),
(135, 119, '文化信息传输服务', '0', 0, '1476148829', 0, 0, 0),
(136, 119, '文化创意和设计服务', '0', 0, '1476148829', 0, 0, 0),
(137, 119, '文化休闲娱乐服务', '0', 0, '1476148829', 0, 0, 0),
(138, 119, '工艺美术品的生产', '0', 0, '1476148829', 0, 0, 0),
(139, 119, '文化产品生产的辅助生产', '0', 0, '1476148829', 0, 0, 0),
(140, 119, '文化用品的生产', '0', 0, '1476148829', 0, 0, 0),
(141, 119, '文化专用设备的生产', '0', 0, '1476148829', 0, 0, 0),
(142, 120, '新闻出版发行服务', '0', 0, '1476148829', 0, 0, 0),
(143, 120, '广播电视电影服务', '0', 0, '1476148829', 0, 0, 0),
(144, 120, '文化艺术服务', '0', 0, '1476148829', 0, 0, 0),
(145, 120, '文化信息传输服务', '0', 0, '1476148829', 0, 0, 0),
(146, 120, '文化创意和设计服务', '0', 0, '1476148829', 0, 0, 0),
(147, 120, '文化休闲娱乐服务', '0', 0, '1476148829', 0, 0, 0),
(148, 120, '工艺美术品的生产', '0', 0, '1476148829', 0, 0, 0),
(149, 120, '文化产品生产的辅助生产', '0', 0, '1476148829', 0, 0, 0),
(150, 120, '文化用品的生产', '0', 0, '1476148829', 0, 0, 0),
(151, 120, '文化专用设备的生产', '0', 0, '1476148829', 0, 0, 0),
(152, 121, '新闻出版发行服务', '0', 0, '1476148829', 0, 0, 0),
(153, 121, '广播电视电影服务', '0', 0, '1476148829', 0, 0, 0),
(154, 121, '文化艺术服务', '0', 0, '1476148829', 0, 0, 0),
(155, 121, '文化信息传输服务', '0', 0, '1476148829', 0, 0, 0),
(156, 121, '文化创意和设计服务', '0', 0, '1476148829', 0, 0, 0),
(157, 121, '文化休闲娱乐服务', '0', 0, '1476148829', 0, 0, 0),
(158, 121, '工艺美术品的生产', '0', 0, '1476148829', 0, 0, 0),
(159, 121, '文化产品生产的辅助生产', '0', 0, '1476148829', 0, 0, 0),
(160, 121, '文化用品的生产', '0', 0, '1476148829', 0, 0, 0),
(161, 121, '文化专用设备的生产', '0', 0, '1476148829', 0, 0, 0),
(162, 122, '园区', '0', 0, '1476148829', 0, 0, 0),
(163, 122, '基地', '0', 0, '1476148829', 0, 0, 0),
(164, 123, '会展活动', '0', 0, '1476148829', 0, 1, 0),
(165, 123, '会展企业', '0', 0, '1476148829', 0, 0, 0),
(166, 123, '会展场馆', '0', 0, '1476148829', 0, 0, 0),
(167, 164, '会议', '0', 0, '1476148829', 0, 0, 0),
(168, 164, '展览会', '0', 0, '1476148829', 0, 0, 0),
(169, 164, '博览会', '0', 0, '1476148829', 0, 0, 0),
(170, 164, '交易会', '0', 0, '1476148829', 0, 0, 0),
(171, 164, '展销会', '0', 0, '1476148829', 0, 0, 0),
(172, 164, '展销会', '0', 0, '1476148829', 0, 0, 0),
(173, 164, '展示会', '0', 0, '1476148829', 0, 0, 0),
(174, 5, '法律', '0', 0, '1476148829', 0, 0, 0),
(175, 5, '行政法规', '0', 0, '1476148829', 0, 0, 0),
(176, 5, '地方性法规', '0', 0, '1476148829', 0, 0, 0),
(177, 5, '部门规章', '0', 0, '1476148829', 0, 0, 0),
(178, 5, '文化部文件', '0', 0, '1476148829', 0, 0, 0),
(179, 5, '文化厅制度', '0', 0, '1476148829', 0, 0, 0);";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_art_category where cid <180;";
     $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}