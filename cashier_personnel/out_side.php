<!DOCTYPE HTML>
<html>
<head>
<link href="../image-picker/image-picker.css" rel="stylesheet"/>

</head>

<body>

<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
                /*background-color: yellow;*/
            }
</style>





<select class="image-picker" multiple>
  <optgroup label="PlaceIMG">
    <option data-img-src="../images/i_know_i_love_you.jpg"  
  data-img-label='image label'
  data-img-class="custom-class"
  data-img-alt="image alt"
  value='1'>PlaceIMG 1</option>
    <option data-img-src="https://placeimg.com/220/200/arch" value="2">PlaceIMG 2</option>
    <option data-img-src="https://placeimg.com/220/200/nature" value="3">PlaceIMG 3</option>
    <option data-img-src="https://placeimg.com/220/200/people" value="4">PlaceIMG 4</option>
    
  </optgroup>
  <optgroup label="picsum.photos">
    <option data-img-src="https://picsum.photos/200/200/?random" value="5">picsum.photos 1</option>
    <option data-img-src="https://picsum.photos/230/200/?random" value="6">picsum.photos 2</option>
    <option data-img-src="https://picsum.photos/150/200/?random" value="7">picsum.photos 3</option>
    <option data-img-src="https://picsum.photos/270/200/?random" value="8">picsum.photos 4</option>
    
  </optgroup>
</select>


<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="../image-picker/image-picker.js"></script>
<script src="../image-picker/image-picker.min.js"></script>

<script>
$(".image-picker").imagepicker({

  // show/hide the regular select box
  hide_select: true,

  // show/hide image labels
  show_label: false,

  // callback functions
  initialized: undefined,
  changed: undefined,
  clicked: undefined,
  selected: undefined,

  // set the max number of selectable options 
  limit: undefined,

  // called when the limit cap has been reached
  limit_reached: undefined,

  // using Font Awesome icons instead
  font_awesome: false
  
})
</script>
</body>
</html>