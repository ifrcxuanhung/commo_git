<?php   
$template_url = template_url();

//$template_url = str_replace('simulation','welcome',$template_url_); 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
    <meta charset="utf-8"/>
    <title><?php echo $logo_txt[0]['name'].' '.$logo_txt[1]['name'] ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo $template_url; ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>layouts/layout5/css/layout.css" rel="stylesheet" type="text/css" />
        <?php if($this->router->fetch_class() == 'start' || $this->router->fetch_class() == 'simulation' || $this->router->fetch_class() == 'management'){?>
            <link href="<?php echo $template_url; ?>layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css"/>
        <?php }else {?>
            <link href="<?php echo $template_url; ?>layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo $template_url; ?>layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css"/>
        <?php } ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>css/style.css">
        <link href="<?php echo $template_url; ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="<?php echo $template_url; ?>global/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/select2/css/select2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link href="<?php echo $template_url; ?>global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>pages/css/portfolio.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/clockface/css/clockface.css"/>
        <link href="<?php echo $template_url; ?>pages/css/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>pages/css/profile.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/icheck/skins/all.css" rel="stylesheet"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <!-- DOC: To use 'material design' style just load 'components-md.css' stylesheet instead of 'components.css' in the below style tag -->

        <link href="<?php echo $template_url; ?>global/css/plugins-md.css" rel="stylesheet" type="text/css"/>

        <!--link href="<?php echo $template_url; ?>pages/css/style.css" rel="stylesheet" type="text/css"/-->
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-editable/inputs-ext/address/address.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-summernote/summernote.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>pages/css/login-4.min.css">

        <!--css JQGRID-->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/test/css/jquery-ui.css" />
        <!-- The link to the CSS that the grid needs -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/test/css/ui.jqgrid.css" />

        <?php if($this->router->fetch_class() == 'profile'){?>
            <!--ELFINDER CSS-->
            <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/plugins/elfinder/css/elfinder.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/plugins/elfinder/css/theme.css">
            <!--END ELFINDER CSS-->
        <?php }?>

    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="<?php echo $template_url; ?>img/favicon.ico"/>
    </head>

    <?php if( $this->router->fetch_class() == 'management'){?>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content" style="background:url(<?php echo $template_url.$setting["bg_management_page"]; ?>) center center no-repeat fixed #2f373e !important" >
    <?php } else if ($this->router->fetch_class() == 'start' || $this->router->fetch_class() == 'simulation') { ?>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content" style="background:url(<?php echo $template_url.$setting["bg_start_page"]; ?>) center center no-repeat fixed #2f373e !important" >
   
    <?php } else { ?>
     <body class="page-md page-header-fixed page-quick-sidebar-over-content" > 
    <?php } ?>
    Tính tới hết ngày giao dịch cuối cùng của quý 2/2012 là 29/06/2012 thì cả 2 sàn giao dịch chính của Việt Nam là HOSE và HNX có đúng 700 cổ phiếu niêm yết thì có: 375 cổ phiếu có giá dưới 10.000 đồng/cp (mệnh giá), 207 cổ phiếu có giá từ 10.000 – 20.000 đồng/cp, 60 cổ phiếu có giá từ 20.000 – 30.000 đồng/cp, 36 cổ phiếu có giá từ 30.000 – 40.000 đồng và còn lại là 22 cổ phiếu có giá từ  40.000 đồng/cp trở lên. Chi tiết tại đây (nên tải về – file excel .xls)

    – Để đảm bảo tính đại diện mình xin lấy 02 mã chứng khoán có giá quanh 10.000 đồng cổ phiếu, 01 tại sàn HOSE và 01 tại sàn HNX để thấy được mức tối thiểu nên có khi chơi chứng khoán hiện nay

    – Với sàn HOSE của Sở giao dịch Chứng khoán Tp. Hồ Chí Minh: mình xin chọn cổ phiếu PXS của Công ty CP Kết cấu Kim loại và Lắp máy Dầu khí (PVC-MS) – 1 mã khá cơ bản, làm ăn tốt, P/E hợp lý hiện nay đang có giá 10.100 đồng/cp. Với quy định đơn vị nhỏ nhất khi mua bán là bội số của 10 cổ phiếu (tức là chỉ mua được 10, 20, 30, 40, …,80, 90, … cổ phiếu). Như vậy mức mua tối thiểu trong trường hợp này là: (10 cp   x   10.100 đ/cp) x (1  +  0,35% phí giao dịch) = 101.354 đồng. Với 500.000 đồng bỏ ra bạn hoàn toàn mua được 40 cổ phiếu PXS. Ngay cả với các mã giá cao như DPM (Đạm Phú Mỹ) là 34.300 đồng/cp thì bạn vẫn mua được 10 cổ phiếu DPM. Một số tiền khá nhỏ để đầu tư nếu chơi sàn HOSE.

    – Với sàn HNX của Sở giao dịch Chứng khoán Hà Nội: mình xin chọn cổ phiếu HUT của Công ty CP Tasco (Tasco) – 1 mã khá cơ bản, làm ăn tốt, P/E hợp lý hiện nay đang có giá 11.100 đồng/cp. Với quy định đơn vị nhỏ nhất khi mua bán là bội số của 100 cổ phiếu (tức là chỉ mua được 100, 200, 300, 400, …,800, 900, … cổ phiếu). Như vậy mức mua tối thiểu trong trường hợp này là: (100 cp   x   11.100 đ/cp) x (1  +  0,35% phí giao dịch) = 1.113.885 đồng. Với 5.000.000 đồng bỏ ra bạn hoàn toàn mua được 400 cổ phiếu HUT. Ngay cả với các mã giá cao như DBC (Dabaco) là 22.900 đồng/cp thì bạn vẫn mua được 200 cổ phiếu DBC. Một số tiền vừa phải để đầu tư nếu chơi sàn HNX.

    – Qua 02 ví dụ nêu trên, có thể số tiền ban đầu dùng để vừa đầu tư vừa học là không nhiều, nếu xét đến cả tinh cơ động của tiền cũng như cảm nhận chính xác sự được thua thì đầu tư ban đầu tầm 2 – 5 triệu đồng là hợp lý. Thêm nữa trong 1 đợt thị trường biến động mạnh được thua sẽ tầm 20 – 30%, còn bình thường là 5 – 10% thì thức sự  cùng lắm bạn cũng chỉ mất 400 ngàn đồng – 1 triệu đồng trên tổng 2 – 5 triệu đồng ban đầu đưa vào để vừa chơi vừa học. Càng hợp lí hơn nếu bạn định chơi 50 – 100 triệu đồng trở lên, thì mức mất mát 400 ngàn đồng – 1 triệu đồng kia càng không ảnh hưởng đáng kể gì. Một điểm cần nói thêm ở đây là khi mới chơi bạn không thể chơi chỉ duy nhất mã vào 1 thời điểm được, có thể là 3 – 5 mã chứng khoán, gồm cả ở sàn HOSE và HNX để am hiểu cơ chế cả 2 sàn cũng như môi trường của mỗi sàn. Vậy nên số tiền tối thiểu hợp lý cần ở đây là khoảng 2 triệu đồng (Lưu ý tối thiểu hợp lý chứ không phải là số tiền nhỏ nhất để có thể chơi được được). Chúc các bạn thành công, nếu cần có câu hỏi gì thêm liên quan tới vấn đề này, hãy pm lại cho mình theo thông tin ở bên.

    2 triệu đồng là số tiền tối thiểu hợp lý đề tìm hiểu thực tế về đầu tư chứng khoán

    – Một lời khuyên nữa cần hướng tới là nếu bạn sau vài năm đi làm tích lũy được 100 triệu đồng, chán với lãi suất tiết kiệm quá thấp (hiện là 9%/năm hay 0,75%/tháng), và không có kênh đầu tư nào hợp lí hơn chứng khoán với số vốn nhỏ như thế cũng như quỹ thời gian vừa đủ (so với mở cửa hàng kinh doanh riêng, bất động sản, …) thì chỉ tối đa chỉ nên chơi 50 triệu đồng, còn 50 triệu đồng còn lại vẫn nên gửi ở ngân hàng để đề phòng những trường hợp cần thiết cho cuộc sống của bạn, hết sức tránh việc đang mua chứng khoán, chờ nó lên chốt lãi thì phải bán sớm vì cần tiền, một điểm nữa là khi chơi “tất tay” kiểu đó thì tâm lý cũng “khác” so với chơi không hết tiền, do đó ảnh hưởng tới phán đoán phân tích trong quá trình chơi chứng khoán, mục tiêu ở đây là trung bình lãi 5 – 10% / tháng và ít khi bị thua lỗ chứ không phải “tất tay” như kiểu “đánh bạc”. Vấn đề chính ở đây là sự nghiêm túc tuân thủ nguyên tắc trong quá trình đầu tư cũng như bỏ công sức thời gian vào, bạn sẽ được như ý muốn.

    —————————————————————

    Chơi Chứng khoán lãi được khoảng bao nhiêu một năm?
    Do có rất nhiều người hỏi mình là chơi chứng khoán lãi nhiều nhất được bao nhiêu, thực sự là mình không muốn trả lời câu hỏi này, vì lãi nhiều nhất bao giờ cũng đi kèm với rủi ro là cao nhất, theo như mình thấy 90% người có quan điểm này thật khi chơi, cuối cùng đều thua nặng, thậm chí phải bán tài sản cá nhân đi để bù vào phần thua lỗ đó. Tuy nhiên, do có nhiều người hỏi, vậy mình xin trả lời để mọi người được rõ, trước hết cần phải hiểu đầu tư chứng khoán là loại hình đầu tư rủi ro cao, 1 loại hình đầu tư cao cấp của nền kinh tế (mình không bàn tới khía cạnh kinh tế là kênh huy động vốn dài hạn cho nền kinh tế). Không thể có chuyện đầu tư chứng khoán mà hàng tháng cứ tằng tằng sinh lãi đều 5 – 10%/tháng như kinh doanh thông thường được, mà nó có đợt, có 1 số tháng sẽ lãi rất cao (sóng lên), còn lại đa phần các tháng là bình thường, thậm chí còn thua lỗ. Vì vậy ở đây mình không bàn tới tháng bình thường, sẽ nói về đợt có sóng lớn, thông thường hàng năm thường có 1 hoặc 2 đợt sóng, và thường kéo dài từ 2 – 3 tháng. Như 2 đợt sóng gần đây nhất là đợt từ tháng 1 – 4/2012 và đợt hiện nay từ tháng 12/2012 – 2/2013. Trong các đợt sóng này, chỉ số Index chung toàn thị trường thường lên điểm khoảng 20 – 30%, các mã đầu cơ thường tăng 40 – 50% và cá biệt có 1 số mã tăng hơn 100%. Chúng ta có thể quan sát qua thống kế sau đây trong con sóng gần đây nhất tháng 12/2012 – 2/2013:

    Chi tiết hơn có thể xem tại đây (lưu ý rằng đây là giá gốc bắt đầu là giá tham chiếu ngày đầu tháng 12 – 03/12/2012 và giá cuối là giá kết thúc của ngày cuối cùng trước tết âm lịch – 08/02/2013; không phải là giá thấp nhấp và cao nhất nhằm đại diện cho tính phổ biến của sóng thị trường; 1 số mã có thực hiện điều chỉnh do sự thay đổi về quyền cổ tức tiền mặt, cổ phiếu, thưởng cổ phiếu và phát hành thêm; các cổ phiếu được chọn lọc phải đạt đủ tiêu chí về thanh khoản, tức là có giao dịch đủ lớn để giá trên đạt được đặc tính theo cơ chế thị trường: ít nhất 100 ngàn cổ phiếu trung bình hàng ngày hoặc ít nhất 1 tỷ đồng giá trị giao dịch trung bình hàng ngày trong 10 phiên giao dịch từ 28/01 – 08/02/2013). Vần đề điều chỉnh giá do quyền mình sẽ trình bày trong 1 chủ đề khác.

    Nhìn vào bảng trên chúng ta có thể thấy rằng sự biến động giá tăng trong sóng lên là rất lớn, tuy nhiên gần như không có người nào ăn được đầy đủ cả 1 con sóng dài như thế, vì kể cả khi lên thì nó cũng không lên thẳng mà còn đập lên đập xuống theo xu hướng lên, rất có thể trong quá trình đó, sự phán đoán không hoàn toàn khớp với thị trường cũng như sự hài lòng với mức lãi đã có tại lúc đó để thoát hàng và chốt lãi. Ở đây, mình xin đặt ra mức mục tiêu hợp lý là chọn được cổ phiếu có mức tăng trưởng khoảng 50 – 60% cả sóng và mình kiếm được khoảng hơn 1/2 con sóng đó. Như vậy mức lãi hợp lý cho 1 con sóng vào khoảng 25 – 30%. Quá hợp lý! trong vòng khoảng 1 tháng có sóng như vậy (Vào khi sóng đã tương đối rõ và ra sớm khi cảm giác hài lòng). 1 lần nữa mình xin nhắc lại, không có chuyện chơi chứng khoán lãi đều đều mỗi tháng 5 – 10%, và không nên luôn luôn đặt mục tiêu kiếm mã nào lãi cao nhất (vì rủi ro là lớn nhất, thậm chí bay hết cả thành quả, nếu không muốn nói là lỗ nếu còn hi vọng lên nữa trong khi sóng xuống cũng đã bắt đầu khi sóng lên đi vào cuối sóng). Và thực tế cũng đã chứng minh với một người thông thường chơi hợp lý không tham, không kỳ vọng quá, tuân thu đúng phương pháp và nguyên tắc thì mình sinh lời hợp lý thường vào khoảng 20 – 30% / năm.

    —————————————————————

    Chơi bao nhiêu tiền thì hợp lý?
    Như ở trên đã trình bày thì chúng ta đã biết số tiền chơi tối thiểu để có thể tham gia tìm hiểu chứng khoán là khoảng 2 triệu đồng. Tuy nhiên đó có phải số tiền hợp lý để tham gia hay không? thì lại là một vấn đề rất là khác. Rõ ràng là khi chưa hiểu biết mấy về một lĩnh vực nào đó đặc biệt lĩnh vực hàm chứa rủi ro nhiều như chứng khoán thì mới tham gia vào sẽ đặt nặng tính … “an toàn” của số tiền bỏ vào đầu tư lên hàng đầu. Và lẽ dĩ nhiên thì càng thấp càng tốt, nhưng chính cái việc càng thấp càng tốt đó đôi khi lại gây ra sự phản tác dụng đặc biệt lớn. Để hiểu rõ hơn chúng ta cùng theo dõi ví dụ mô phỏng thực tế đã từng phát sinh sau:

    + Một nhà đầu tư A là 1 sinh viên sống tại Hà Nội, có ý chí vươn lên trong cuộc sống, sau một thời gian tích góp làm thêm cũng có 1 số tiền là 5 triệu đồng, cũng sau 1 thời gian tìm hiểu nữa thì quyết định tìm tới mình để mở 1 tài khoản chứng khoán và tham gia vào đầu tư. Số tiền so với khách chung trên thị trường thực sự là rất nhỏ, nhưng mình thấy 1 đặc điểm tựu chung lai là: rất chịu khó tìm hiểu, tài khoản chỉ biến động 50 – 100 ngàn đồng cũng rất xót xa, rồi cũng tham vấn là nên đầu tư mã này mã kia, ưu nhược điểm ra sao, … nói chung là cái mà mình cảm nhận được là học được rất nhiều dù chỉ là sinh viên của 1 trường kỹ thuật và lẽ tất nhiên là nghành học thì chả liên quan 1 chút nào tới chứng khoán cả; và đương nhiên cảm nhận chung là nếu còn duy trì đầu tư thế này thì tương lai còn tiến xa.

    + Một nhà đầu tư khác là B là 1 bạn đã đi làm 15 năm, đang muốn thử xem chứng khoán là gì mà sao bạn bè hay chơi, và biết đâu là kênh này cũng kiếm được thay vì để tiền trong ngân hàng với lãi suất tiết kiệm rất thấp hiện này 7%/năm. Đặc điểm của bạn này khi mình tiếp xúc là có tiền, khoảng 500 triệu đồng và công việc bên ngoài cuộc sống khá bận, thỉnh thoảng mới ngó đc chút bảng giá. Và tất nhiên khi mở tài khoản cũng “thử” với số tiền 5 triệu để đầu tư trên Thị trường Chứng khoán. Đây là một số tiền khá nhỏ so với tài sản của bạn đó nên sau 1 thời gian mình rút lại được 1 số đặc điểm: do cả công việc bận nên khi mua 1 vài mã chứng khoán xong thì thỉnh thoảng ngó tí rồi trò chuyện chat hỏi thăm, mất 100 – 200 hay thậm chí là 500 ngàn đồng cũng chả thấy xót xa và tặc lưỡi chắc rồi nó sẽ lên lại thôi và không cần phải tìm hiểu nhiều, … nôm na không ảnh hưởng gì đáng kể tới tài sản hay thu nhập của bạn đó nên chả có động lực nào để tìm hiểu sâu về chứng khoán và tất cả chỉ dừng lại ở việc biết mở tài khoản chứng khoán như thế nào, biết nhập lệnh mua bán ra sao, biết nộp tiền rồi rút tiền ra sao, … là hết.

    Qua ví dụ trên, có thể thấy cũng 5 triệu đồng tham gia nhưng cách tiếp cận lại rất khác nhau, và dẫn đến cái “học” được cũng rất khác nhau. Nếu là bạn thì bạn muốn mình rơi vào trường hợp nào???Bạn muốn học qua loa để biết hay muốn đầu tư một cách nghiêm túc như là 1 kênh đầu tư để tăng trường vốn / tài sản tự có của mình mỗi năm 20 đến 30%???Cuối cùng điều mình muốn nhấn mạnh ở đây là chơi ít nhất vẫn chưa chắc đã phải là tốt nhất và chơi nhiều nhất thì càng không được, không thể mới chơi có 500 triệu đồng lại vác luôn cả 500 triệu đồng (100%) đó ra để đầu tư được, vì như thế là quá rủi ro cho một người mới bước chân vào và đó là số tiền mà bạn phải mất 1 thời gian dài mới có được. Và thực tế nhiều lần quan sát rất nhiều tài khoản đã chứng minh nên tham gia vào khoảng 10% đến 20% tài sản bạn đang có là vừa nhất, vừa đảm bảo có cảm nhận được thua rõ rệt mất mát để có động lực “học” nhưng cũng không mất mát nhiều quá mà ảnh hưởng tới cuộc sống của bạn. Còn bạn có bao nhiêu tiền để từ đó quyết định nên chơi chính xác khoảng bao nhiêu tiền chắc chỉ có bạn biết và quyết định.

    —————————————————————

    Có nên chơi chứng khoán ảo?
    Câu hỏi này cũng được khá nhiều bạn hỏi mình khi add nick chat trao đổi. Tiện đã trình bày ở trên vấn đề chơi bao nhiêu thì hợp lý thì trình bày tiếp vấn đề này. Theo mình là không nên chơi chứng khoán ảo, vì:

    + Thứ nhất: là mặc dù nhiều trang chứng khoán ảo như hoclamgiau hay vietstock đã rất cố gắng mô phỏng một cách giống nhất giữa chứng khoán ảo và thật nhưng sau khi tiếp xúc với các bạn chơi chứng khoán ảo xong mới thấy những câu hỏi rất khác so với thực tế phát sinh ví dụ cần phải có lệnh đối ứng thực tế đủ lớn thì mới mua đủ nhưng đàng này cứ có lệnh treo bán 1 ít khối lượng là bạn đặt mua bao nhiêu cũng được, 1 số trang thì thời gian thanh toán không đúng với T+3 ngoài thực tế, … Sự sai khác đó cũng đến từ nguyên nhân sâu xa là do Việt Nam là nước mới phát triển thị trường chứng khoán nên quy định pháp lý liên tục được cập nhật thay đổi, chứ không ổn định như các quốc gia phát triển lâu đời, nên chính bản thân các trang cũng không thể cập nhật kịp thực tế.

    + Thứ hai: như đã nói ở trên và cũng là lí do quan trọng là bạn chơi ảo thì cũng chả khác gì bạn chơi với số tiền rất ít ở trên, giá cổ phiếu có lên xuống thế nào đi chăng nữa cũng không làm bạn bị áp lực lo sợ hay tham lam, hi vọng. Như thế thì làm sao bạn có động lực để tìm hiểu và ghi nhớ, nhất là lúc bận ngoài cuộc sống. Và như thế thì vô hình chung đã mất đi tính quan trọng nhất khi mới tìm hiểu là “học” chứng khoán. Vẫn như nói ở trên, nên chơi thật nhưng với tỉ lệ “vừa phải”.

    ——————————————
    <!-- BEGIN MAIN LAYOUT -->
	 <div class="page-container main-container" style="margin:0px;">
         <?php echo $header; ?>
	    <div class="container-fluid main-container margin-bottom-40" >
        
        	<!-- <div class="loader"></div>-->
             <div class="loader" style="display:none;"></div>
        	<div class="modal bs-modal-md fade" id="modals" role="dialog" aria-hidden="true" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body">
							<img src="<?php echo template_url(); ?>global/img/loading-spinner-grey.gif" alt="" class="loading"/>
							<span>
							&nbsp;&nbsp;Loading... </span>
						</div>
					</div>
				</div>
			</div>
            <div class="modal bs-modal-md fade" id="login_modals" role="dialog" aria-hidden="true" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body">
							<img src="<?php echo template_url(); ?>global/img/loading-spinner-grey.gif" alt="" class="loading"/>
							<span>
							&nbsp;&nbsp;Loading... </span>
						</div>
					</div>
				</div>
			</div>
            
            <?php echo $content; ?>
              
        </div> 
    </div>

    <p class="copyright">
    	<?php translate('dev_by'); ?> <a href="http://ifrc.fr/" target="_blank" style="color: #1c89b3 ;">IFRC</a>
    </p>
    <!-- END MAIN LAYOUT -->
    <a href="javascript:;" class="go2top"><i class="icon-arrow-up"></i></a>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="<?php echo $template_url; ?>global/plugins/respond.min.js"></script>
    <script src="<?php echo $template_url; ?>global/plugins/excanvas.min.js"></script> 
    <![endif]-->
    
    <script type="text/javascript">
        var $template_url = '<?php echo $template_url; ?>';
        var $base_url = '<?php echo base_url(); ?>';
		var $simulation_url = '<?php echo $simulation_url; ?>';
        var $app = {'module': '<?php echo $this->router->fetch_module(); ?>',
            'controller': '<?php echo $this->router->fetch_class(); ?>',
            'action': '<?php echo $this->router->fetch_method(); ?>'};
    </script>

 
    <script src="<?php echo $template_url; ?>global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
     
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <!-- <script src="<?php /*echo $template_url; */?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>-->
    <script src="<?php echo $template_url; ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    
    <!--<script src="<?php /*echo $template_url; */?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>-->
    <!--<script src="<?php /*echo $template_url; */?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
     <!--<script src="<?php /*echo $template_url; */?>pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>-->
    <!-- END CORE PLUGINS -->
    
   <!-- <script type="text/javascript" src="<?php /*echo $template_url; */?>global/plugins/ckeditor/ckeditor.js"></script>-->
   <script src="<?php echo $template_url;?>global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/scripts/app.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>

    <!--<script src="<?php /*echo $template_url; */?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>-->
  	<script src="<?php echo $template_url; ?>global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="<?php echo $template_url; ?>global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

    <!--edit form-->
    <script src="<?php echo $template_url; ?>global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery.mockjax.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $template_url; ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
    <script src="<?php echo $template_url; ?>pages/scripts/ui-modals.min.js" type="text/javascript"></script>

    <script data-main="<?php echo base_url(); ?>assets/apps/welcome/main" src="<?php echo base_url(); ?>assets/bundles/require.js"></script>
    <!--BEGIN AMCHART-->
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>

    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/none.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/scripts/amchart.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart2.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart3.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart4.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart5.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart6.js" type="text/javascript"></script>
    <!--END AMCHART-->
    
    <!--scroll-->


    <!-- END ECHARTS PLUGINS -->
    <!-- END CUSTOME JAVASCRIPTS -->
   
    
<!--<script language=JavaScript>
  var message="!!YOU CANNOT COPY ANY TEXT OR IMAGE FROM THIS SITE!";
  function clickIE4()
  {
    if (event.button==2)
    {
      alert(message);
      return false;
    }
  }
  function clickNS4(e)
  {
    if (document.layers||document.getElementById&&!document.all)
    {
      if (e.which==2||e.which==3)
      {
        alert(message);
        return false;
      }
    }
  }

  if (document.layers)
  {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
  }
  else if (document.all&&!document.getElementById)
  {
    document.onmousedown=clickIE4;
  }
  document.oncontextmenu=new Function("alert(message);return false")
</script>
-->

<script type="text/JavaScript">

	function killCopy(e){
		return false
	}
	function reEnable(){
		return true
	}
//	document.onselectstart=new Function ("return false")
//		if (window.sidebar){
//			document.onmousedown=killCopy
//			document.onclick=reEnable
//		}
</script>

<script>
$("input").keyup(function(event)
{
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13')
    {   
        $('#LoginProcess').click();
    }
});
</script>
    
</body>
<!-- END BODY -->
</html>