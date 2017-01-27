<div class="overlay" id="popup-about">
  <div class="modal modal-about">
    <span class="popup-close close uk-icon-justify uk-icon-remove white-close"></span>
    <h1 class="about-popup-title">DOMS - портал идей для дизайна интерьеров</h1>
    <div class="slider owl-carousel" id="owl-demo">
      <?php
        $slides = Illuminate\Support\Facades\DB::table('slides')->get();
      ?>
      @foreach ($slides as $slide)
        <div class="item">
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
      @endforeach
    </div>
  </div>
</div>
