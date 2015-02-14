/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 15-2-14
 * Time: 上午9:47
 * To change this template use File | Settings | File Templates.
 */

function getformdata(formlabel)
{
    var field = '';
    $(formlabel).each(function(){
        var name = $(this).attr('name');
        // alert(name);
        var datatype = $(this).attr('data');
        // alert(datatype);
        var comment = $(this).parent().prev();
        // console.log(comment[0]['textContent']);
        comment = comment[0]['textContent'];
        // console.log($(this).parent().prev());
        // alert(comment);
        if(name!=undefined && datatype!=undefined)
        {
            field += comment+':'+name+':'+datatype+'||';
        }
        else
        {
            field += comment+'||';
        }
    });
    return field;
}
