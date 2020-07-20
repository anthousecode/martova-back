<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Document</title>
</head>

<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '467278400623639',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v7.0'
            });
        };
    </script>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
   

    <button onclick="foof()">TEST</button>

<script>
function foof() {
	FB.ui({
  method: 'share_open_graph',
  action_type: 'matchadviceuk:share',
  action_properties: JSON.stringify({
    type: 'matchadviceuk:quiz',
    url: "https://www.facebook.com/martovoe/",
    image: 'https://scontent-cph2-1.xx.fbcdn.net/v/t1.0-9/90557350_143698487181835_4717592550372802560_o.jpg?_nc_cat=102&_nc_sid=e3f864&_nc_oc=AQndznKA_DX5UGjBzDVXLJirDSLF-fJUJPlkBMh5hX-O7AWuiu9INc0cAKP-qvzx1S8&_nc_ht=scontent-cph2-1.xx&oh=095430b5956909f7c684e4a50b4da17e&oe=5F238530'
   })
});


}
    </script>
</body>

</html>
