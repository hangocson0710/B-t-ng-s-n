
function get_district(select_id=null ,district_id,url, old_province=null , oldvalue =null ) {
    var select_id = $(select_id).val();
    $.ajax({
        type:'GET',
         url: url+'/'+select_id,

        success:function (data){
            $(district_id).empty();

             var   district = data['district'];
            $(district_id).append(district);
            if(old_province !=null){
                console.log(district_id);
                $(district_id).val(old_province).trigger('change');

            }
        }
        });

 }
function get_ward(select_id ,ward_id,url, old_district =null , oldvalue =null ) {
    var select_id = $(select_id).val();
    $.ajax({
        type:'GET',
         url: url+'/'+select_id,
        success:function (data){
            $(ward_id).empty();
             var  ward = data['ward'];
            $(ward_id).append(ward);
            if(old_district != null){
                console.log(old_district);
                $(ward_id).val(old_district).trigger('change');
            }
        }
        });
 }
