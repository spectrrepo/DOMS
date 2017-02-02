<div class="overlay" id="popup-about">
  <div class="modal modal-about">
    <span class="popup-close close uk-icon-justify uk-icon-remove white-close"></span>
    <h1 class="about-popup-title">DOMS - портал идей для дизайна интерьеров</h1>
    <div class="slider-pole">
      <?php
        $slides = Illuminate\Support\Facades\DB::table('slides')->get();
      ?>
      @foreach ($slides as $slide)
        @if ($slides[0] == $slide)
          <div class="item active-about">
            <table>
              <tr>
                <td  class="b-img-about">
                  <img class="img-about" src="{{ $slide->photo }}" alt="дизайнер у компьютера DOMS" />
                </td>
                <td class="text-about top33carousel">
                  {{ $slide->text }}
                </td>
              </tr>
            </table>
          </div>
        @else
          <div class="item right-about">
            <table>
              <tr>
                <td  class="b-img-about">
                  <img class="img-about" src="{{ $slide->photo }}" alt="дизайнер у компьютера DOMS" />
                </td>
                <td class="text-about top33carousel">
                  {{ $slide->text }}
                </td>
              </tr>
            </table>
          </div>
        @endif
      @endforeach
    </div>
    <span class="nav-slide-about prev-nav-slide-about" data-direction="prev"></span>
    <span class="nav-slide-about next-nav-slide-about" data-direction="next"></span>
  </div>
</div>
