<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
<table>
    <thead>
        <tr>
            <td>S. No.</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody id="list"></tbody>
</table>
<div id="pagination"></div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
var page_no = 1;
getList(page_no);
function getList(page_no){
    $.ajax({
        type:'POST',
        url:'http://localhost/blog/public/get-name-list',
        data:{'page':page_no},
        dataType:'json',
        beforeSend:function(){},
        success:function(response){
            var x='';
            var s_no = (parseInt(response.data.current_page - 1) * parseInt(response.data.per_page) + 1);
            $.each(response.data.data,function(key,value){
                x=x+'<tr>'+
                    '<td>'+parseInt(s_no++)+'</td>'+
                    '<td>'+value.name+'</td>'+
                    '</tr>';
            });
            $('#list').html(x);
            $('#pagination').html(response.page_link);
        },
    });
}

$(document).on('click','.pagination',function(e){
    e.preventDefault() 
});

let i = 1;
$(document).on('click','.page_click',function(){
    var rel = $(this).attr('rel');
    if(rel == 'next'){
        var no = i++;
        getList(parseInt(no+1));
    }else if(rel == 'prev'){
        var no = i--;
        getList(parseInt(no-1));
    }else{
        page_no = $(this).text();
        getList(page_no);
        i = page_no;
    }
});
</script>