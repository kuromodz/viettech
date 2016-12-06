<div class="panel">
    <div class="panel-heading panel-title"><?php $db->breadcrumbMenu($menuPage)?></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <center>
                <table cellspacing="0" cellpadding="0" border="0" align="center">
                    <tr>
                        <td style="text-align:center;font-family:Verdana;font-size:11px;">
                            <font color="#FF0000" style="font-size:20px;">BẢNG TÊN HỌC SINH</font>
                            <br> Kích thước thường dùng: ngang 7cm x cao 2.6cm.
                            <br> Màu sắc thường dùng: 3 màu như bảng tên mẫu.
                        </td>
                        <tr>
                </table>
                <table cellspacing="0" cellpadding="0" border="0" align="center">
                    <tr>
                        <td style="width:500px;height:505px;">
                            <div style="position:absolute;top:80px;">
                                <div class="map_main"><img src="views/template/bgColor.png" border="0">
                                </div>
                                <div class="map1" style="position:absolute;top:0;"><img src="views/template/bgColor.png" border="0" class="map" usemap="#map_01">
                                    <map name="map_01">
                                        <area shape="poly" coords="105,48,152,112,180,96,205,87,230,82,246,82,246,1,224,3,199,6,175,12,150,22,127,33" onclick="change_color('colorwell1','#F19ABD');">
                                        <area shape="poly" coords="253,1,286,3,315,10,339,18,359,27,379,37,394,48,346,112,326,99,307,91,289,86,273,83,252,82" alt="xanh den" onclick="change_color('colorwell1','#29166F');" />
                                        <area shape="poly" coords="399,51,422,71,441,90,458,114,468,130,476,146,482,159,486,171,411,196,404,179,393,160,382,145,372,132,361,123,352,115,399,51" onclick="change_color('colorwell1','#007CC2');" />
                                        <area shape="poly" coords="413,201,488,178,494,200,497,213,499,229,500,252,498,271,497,289,494,307,489,325,413,300,418,282,421,265,420,247,419,231,416,216,413,202" onclick="change_color('colorwell1','#00923F');" />
                                        <area shape="poly" coords="411,307,486,331,472,366,465,378,457,392,447,406,436,419,425,429,412,440,399,451,353,387,369,373,381,360,393,345,403,327,410,307" onclick="change_color('colorwell1','#DA251C');" />
                                        <area shape="poly" coords="348,393,394,455,376,467,358,476,336,486,311,494,285,499,263,501,253,501,254,421,285,418,299,415,317,409,331,403,346,390" onclick="change_color('colorwell1','#F8C301');" />
                                        <area shape="poly" coords="246,501,235,501,213,498,187,493,160,485,141,476,123,467,112,459,105,455,153,391,171,403,186,410,201,415,216,418,231,420,246,421,246,492" onclick="change_color('colorwell1','#8F5444');" />
                                        <area shape="poly" coords="100,451,147,387,134,378,121,363,109,348,99,331,93,318,89,307,14,331,21,351,30,371,40,388,51,403,62,417,74,430,99,450" onclick="change_color('colorwell1','#9168A2');" />
                                        <area shape="poly" coords="86,301,11,325,6,307,1,276,0,239,3,207,12,177,86,201,80,230,80,250,80,274,86,301" onclick="change_color('colorwell1','#1F1A17');" />
                                        <area shape="poly" coords="88,196,14,171,21,150,35,125,48,104,63,86,79,70,92,59,101,52,147,115,128,133,117,145,107,160,97,174,90,195" onclick="change_color('colorwell1','#E67817');" />
                                    </map>
                                </div>
                                <div class="map2" style="position:absolute;top:0;"><img src="views/template/bgColor.png" border="0" class="map" usemap="#map_02">
                                    <map name="map_02">
                                        <area shape="poly" coords="105,48,152,112,180,96,205,87,230,82,246,82,246,1,224,3,199,6,175,12,150,22,127,33" onclick="change_color('colorwell2','#F19ABD');">
                                        <area shape="poly" coords="253,1,286,3,315,10,339,18,359,27,379,37,394,48,346,112,326,99,307,91,289,86,273,83,252,82" alt="xanh den" onclick="change_color('colorwell2','#29166F');" />
                                        <area shape="poly" coords="399,51,422,71,441,90,458,114,468,130,476,146,482,159,486,171,411,196,404,179,393,160,382,145,372,132,361,123,352,115,399,51" onclick="change_color('colorwell2','#007CC2');" />
                                        <area shape="poly" coords="413,201,488,178,494,200,497,213,499,229,500,252,498,271,497,289,494,307,489,325,413,300,418,282,421,265,420,247,419,231,416,216,413,202" onclick="change_color('colorwell2','#00923F');" />
                                        <area shape="poly" coords="411,307,486,331,472,366,465,378,457,392,447,406,436,419,425,429,412,440,399,451,353,387,369,373,381,360,393,345,403,327,410,307" onclick="change_color('colorwell2','#DA251C');" />
                                        <area shape="poly" coords="348,393,394,455,376,467,358,476,336,486,311,494,285,499,263,501,253,501,254,421,285,418,299,415,317,409,331,403,346,390" onclick="change_color('colorwell2','#F8C301');" />
                                        <area shape="poly" coords="246,501,235,501,213,498,187,493,160,485,141,476,123,467,112,459,105,455,153,391,171,403,186,410,201,415,216,418,231,420,246,421,246,492" onclick="change_color('colorwell2','#8F5444');" />
                                        <area shape="poly" coords="100,451,147,387,134,378,121,363,109,348,99,331,93,318,89,307,14,331,21,351,30,371,40,388,51,403,62,417,74,430,99,450" onclick="change_color('colorwell2','#9168A2');" />
                                        <area shape="poly" coords="86,301,11,325,6,307,1,276,0,239,3,207,12,177,86,201,80,230,80,250,80,274,86,301" onclick="change_color('colorwell2','#1F1A17');" />
                                        <area shape="poly" coords="88,196,14,171,21,150,35,125,48,104,63,86,79,70,92,59,101,52,147,115,128,133,117,145,107,160,97,174,90,195" onclick="change_color('colorwell2','#E67817');" />
                                    </map>
                                </div>
                                <div class="map3" style="position:absolute;top:0;"><img src="views/template/bgColor.png" border="0" class="map" usemap="#map_03">
                                    <map name="map_03">
                                        <area shape="poly" coords="105,48,152,112,180,96,205,87,230,82,246,82,246,1,224,3,199,6,175,12,150,22,127,33" onclick="change_color('colorwell3','#F19ABD');">
                                        <area shape="poly" coords="253,1,286,3,315,10,339,18,359,27,379,37,394,48,346,112,326,99,307,91,289,86,273,83,252,82" alt="xanh den" onclick="change_color('colorwell3','#29166F');" />
                                        <area shape="poly" coords="399,51,422,71,441,90,458,114,468,130,476,146,482,159,486,171,411,196,404,179,393,160,382,145,372,132,361,123,352,115,399,51" onclick="change_color('colorwell3','#007CC2');" />
                                        <area shape="poly" coords="413,201,488,178,494,200,497,213,499,229,500,252,498,271,497,289,494,307,489,325,413,300,418,282,421,265,420,247,419,231,416,216,413,202" onclick="change_color('colorwell3','#00923F');" />
                                        <area shape="poly" coords="411,307,486,331,472,366,465,378,457,392,447,406,436,419,425,429,412,440,399,451,353,387,369,373,381,360,393,345,403,327,410,307" onclick="change_color('colorwell3','#DA251C');" />
                                        <area shape="poly" coords="348,393,394,455,376,467,358,476,336,486,311,494,285,499,263,501,253,501,254,421,285,418,299,415,317,409,331,403,346,390" onclick="change_color('colorwell3','#F8C301');" />
                                        <area shape="poly" coords="246,501,235,501,213,498,187,493,160,485,141,476,123,467,112,459,105,455,153,391,171,403,186,410,201,415,216,418,231,420,246,421,246,492" onclick="change_color('colorwell3','#8F5444');" />
                                        <area shape="poly" coords="100,451,147,387,134,378,121,363,109,348,99,331,93,318,89,307,14,331,21,351,30,371,40,388,51,403,62,417,74,430,99,450" onclick="change_color('colorwell3','#9168A2');" />
                                        <area shape="poly" coords="86,301,11,325,6,307,1,276,0,239,3,207,12,177,86,201,80,230,80,250,80,274,86,301" onclick="change_color('colorwell3','#1F1A17');" />
                                        <area shape="poly" coords="88,196,14,171,21,150,35,125,48,104,63,86,79,70,92,59,101,52,147,115,128,133,117,145,107,160,97,174,90,195" onclick="change_color('colorwell3','#E67817');" />
                                    </map>
                                </div>
                                <form class="contactAjax" action="design" method="POST" >
                                  <div id="picker" style="position:absolute;top:150px;left:128px;width:244px;height:94px;">
                                      <table cellspacing="0" cellpadding="0" class="table-border" width="100%" height="100%">
                                          <tr>
                                              <td colspan="2">
                                                  <div id="item1" class="colorwell1">TRƯỜNG TRUNG HỌC CƠ SỞ</div>
                                                  <div id="item2" class="colorwell2">AN DƯƠNG VƯƠNG</div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td style="border-top:0px;border-right:0px;">
                                                  <div id="item3" class="colorwell3">KHÁNH VÂN</div>
                                              </td>
                                              <td style="border-top:0px;">
                                                  <div id="item3" class="colorwell3">9A1</div>
                                              </td>
                                          </tr>
                                      </table>
                                  </div>
                                  <div style="position:absolute;top:245px;left:128px;width:244px;height:94px;text-align:center;">
                                    <br>
                                    <input type="hidden" name="content" data-content="#picker">
                                    <input type="hidden" name="menu" value="<?=$menuPage->id?>">
                                    <input class="form-control" placeholder="Tên khách hàng" type="text" name="title">
                                    <br>
                                    <input class="form-control" placeholder="Số điện thoại" type="text" name="phone">
                                    <br>
                                    <button type="submit" class="btn btn-danger">
                                      <i class="fa fa-send"></i> Gửi yêu cầu
                                    </button>
                                  </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
                <table cellspacing="0" cellpadding="0" border="0" align="center">
                    <tr>
                        <td style="text-align:center;">
                            <br>
                            <br> <img src="views/template/finger.gif" border="0">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family:Verdana;text-align:justify;font-size:11px;">
                            - <b><u>HƯỚNG DẪN CHỌN MÀU BẢNG TÊN:</u></b> 
                            Bạn có thể chọn màu cho 3 chi tiết trong bảng tên bằng cách click chọn từng cá thể (
                            <b>khung và cấp trường, tên trường, tên học sinh và lớp</b>) rồi sau đó click chọn màu trên vòng tròn.
                            <br> - Sau khi hoàn tất chọn màu cho bảng tên. Bạn có thể gửi về cho <b>KHẢI HƯNG</b>. Chúng tôi sẽ liên lạc với bạn để thống nhất thiết kế.
                        </td>
                    <tr>
                </table>
              </center>
            </div>
        </div>
    </div>
</div>

<script src="views/template/jquery.maphilight.min.js"></script>
<script type="text/javascript" charset="utf-8">
  function change_color(des, color) {
      $('.' + des).each(function() {
          $(this).css('color', color);
          $('.' + des + '-value').val(color);
      })
      if (des == "colorwell1") {
          $('.table-border td').css('border-color', color);
      }
  }

  $(document).ready(function() {
      $('.colorwell1').each(function() {
          $(this).css('border', '0px');
      })
      $('.colorwell2').each(function() {
          $(this).css('border', '0px');
      })
      $('.colorwell3').each(function() {
          $(this).css('border', '0px');
      })
      $('.colorwell1').click(function() {
          $('.map_main').css('display', 'none');
          $('.colorwell1').each(function() {
              $(this).css('border', '1px solid #CCCCCC');
              $('.map1').show("slow");
          })
          $('.colorwell2').each(function() {
              $(this).css('border', '0px');
              $('.map2').css('display', 'none');
          })
          $('.colorwell3').each(function() {
              $(this).css('border', '0px');
              $('.map3').css('display', 'none');
          })

      })
      $('.colorwell2').click(function() {
          $('.map_main').css('display', 'none');
          $('.colorwell2').each(function() {
              $(this).css('border', '1px solid #CCCCCC');
              $('.map2').show("slow");
          })
          $('.colorwell1').each(function() {
              $(this).css('border', '0px');
              $('.map1').css('display', 'none');
          })
          $('.colorwell3').each(function() {
              $(this).css('border', '0px');
              $('.map3').css('display', 'none');
          })
      })
      $('.colorwell3').click(function() {
          $('.map_main').css('display', 'none');
          $('.colorwell3').each(function() {
              $(this).css('border', '1px solid #CCCCCC');
              $('.map3').show("slow");
          })
          $('.colorwell1').each(function() {
              $(this).css('border', '0px');
              $('.map1').css('display', 'none');
          })
          $('.colorwell2').each(function() {
              $(this).css('border', '0px');
              $('.map2').css('display', 'none');
          })
      });
      $('.map').maphilight();
  });
</script>
<style type="text/css" media="screen">
    .colorwell {
        cursor: pointer;
    }
    body .colorwell-selected {
        border: 2px solid #000;
        font-weight: bold;
    }
    #item1 {
        font-size: 14px;
        font-weight: bold;
        font-family: Arial;
        text-align: center;
        cursor: pointer;
        color: #291670;
    }
    #item2 {
        font-size: 22px;
        font-weight: bold;
        font-family: Times New Roman;
        text-align: center;
        cursor: pointer;
        color: #D92419;
    }
    #item3 {
        font-size: 18px;
        font-weight: bold;
        font-family: Arial;
        text-align: center;
        cursor: pointer;
        color: #00923F;
    }
    .map1 {
        display: none;
    }
    .map2 {
        display: none;
    }
    .map3 {
        display: none;
    }
    .table-border td {
        border: 2px solid #291670;
    }
</style>
