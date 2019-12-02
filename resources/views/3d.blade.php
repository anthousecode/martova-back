<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="D3.js v4, transition, color, location"/>
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>


<div class="layout hide" id="layout">
  <div id="modal" class="hide">
    <div class="d-flex header">
      <div class="header-part header-part__left pl-2">
        <p class="mb-0 pt-2 pb-1" style="color: red">№160</p>
        <hr class="p-0 m-0">
      </div>
      <div class="header-part header-part__right pt-2 pr-3 pb-1 d-flex">
        <a href="#" id="closer"><span style="font-size: 18px">×</span></a>
      </div>
    </div>
    <div class="base">
      <div class="left">
        <div class="text-container">
          <p>Кадастровый номер:</p>
          <p><b>2342342425453464634634</b></p>
        </div>
        <div class="text-container">
          <p> Площадь: 0,555га</p>
        </div>
        <div class="text-container">
          <p> Статус: <b>Продан</b></p>
        </div>

        <div class="img-container">
          <img src="https://kbkgeo.ru/files/plan-uchastka-dlya-obrashcheniya-v-sud.jpg"
               style ="width: 100%;height: 100%;"
               alt="участок">
        </div>
      </div>
      <div class="right">
        3D план
        <div class="img-container">
          <a class="linkD" id="linkD" href="#">
            <img
                    src="https://www.gwd.ru/upload/resize_cache/iblock/d79/300_200_1/d798f3a72cca1a5dbcb48a8462203422.png"
                    style="width: 100%;height: 100%;"
                    alt="участок">
          </a>

        </div>
      </div>
    </div>
    <div class="sec" id="sec">
      <a href="#">кадастровый план (обменный файл xml )</a>
      <a href="#">геодезическая съемка участка (pdf/ dwg)</a>
    </div>
  </div>
  <iframe class="hide" id="tour" src="http://sweews.herokuapp.com/360" frameborder="0">
  </iframe>
  <a href="#" class="hide" id="closer1"><span style="font-size: 18px">×</span></a>
</div>



<!--New  -->

<div class="wrapper">
  <img class="big-img" id="bigImg" src="./images/big.jpg" alt="">
  <div class="item">
    <div class="wrapper-content-svg" >
      <img src="./images/current-img.jpg" id="mapImg" alt="">
      <div id="map"></div>
    </div>
  </div>
</div>

<!--New  -->

<script src="/js/d3.js"></script>
<script src="/js/d3-selection.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
