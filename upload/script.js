
$(function(){
  // $('.categories').click(function(){
  //   $(this).find('label').css('background-color', 'red');
  // });

  // $('input[type=file]').after('<span></span>');
  //
  // // アップロードするファイルを選択
  // $('input[type=file]').change(function() {
  //   var file = $(this).prop('files')[0];
  //
  //   // 画像以外は処理を停止
  //   if (! file.type.match('image.*')) {
  //     // クリア
  //     $(this).val('');
  //     $('span').html('');
  //     return;
  //   }
  //
  //   // 画像表示
  //   var reader = new FileReader();
  //   reader.onload = function() {
  //     var img_src = $('<img>').attr('src', reader.result);
  //     $('span').html(img_src);
  //   }
  //   reader.readAsDataURL(file);
  // });

  $('#file').change(
    function() {
        if ( !this.files.length ) {
            return;
        }

        var file = $(this).prop('files')[0];
        var fr = new FileReader();
        fr.onload = function() {
            $('#preview').attr('src', fr.result ).css('display','inline');
        }
        fr.readAsDataURL(file);
    });

});
