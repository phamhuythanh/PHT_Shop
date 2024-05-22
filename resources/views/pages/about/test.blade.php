@extends('layout')
@Section('content')

<style>
.radio-label {
  position: relative;
  margin:100px;
}

.toolti {
  visibility: hidden;
  width: 120px;
  background-color: #333;
  color: #fffbfb;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
}

.radio-label:hover .toolti {
  visibility: visible;
}
</style>


{{-- <div class="wrapper">
    <h1>A Simple Carousal Slider</h1>
    <div class="container-slider">
      <div class="slider">
        <div class="items" style="transform: translate3d(0px, 0px, 0px); transition: transform 400ms ease 0s">
          <div class="item">
            <div class="child">1</div>
            <div class="footer"><center><p>zdfd</p></center></div>
          </div>
          <div class="item">
            <div class="child">2</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">3</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">4</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">5</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">6</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">7</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">8</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">9</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">10</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">11</div>
            <div class="footer"></div>
          </div>
          <div class="item">
            <div class="child">12</div>
            <div class="footer"></div>
          </div>
        </div>
        <div class="buttons">
          <div id="left"><i class="fas fa-arrow-circle-left"></i></div>
          <div id="right"><i class="fas fa-arrow-circle-right"></i></div>
        </div>
      </div>
    </div>
</div> --}}

<label for="radio-1" class="radio-label">
  <input type="radio" name="radio-group" id="radio-1" class="radio-input">
  Option 1
  <span class="toolti">This is a tooltip for Option 1</span>
</label>

{{-- <label for="radio-2" class="radio-label">
  <input type="radio" name="radio-group" id="radio-2" class="radio-input">
  Option 2
  <span class="toolti">This is a tooltip for Option 2</span>
</label>

<label for="radio-3" class="radio-label">
  <input type="radio" name="radio-group" id="radio-3" class="radio-input">
  Option 3
  <span class="toolti">This is a tooltip for Option 3</span>
</label> --}}
@endsection