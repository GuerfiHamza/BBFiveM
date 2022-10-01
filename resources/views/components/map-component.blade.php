<div class="map" style="position: relative; height: 2048px; width: 2048px; transform-origin: top left; transform: scale(0.25);">
    <img src="{{ asset('img/map.jpg') }}" style="width: 100%; height: 100%;" alt="Map">
    <div class="point" style="content: ''; position: absolute; bottom: {{ $position['x'] }}px; left: {{ $position['y'] }}px; width: {{ isset($position['radius']) ? $position['radius'] : '50' }}px; height: {{ isset($position['radius']) ? $position['radius'] : '50' }}px; background: red; border-radius: 50%;"></div>
</div>