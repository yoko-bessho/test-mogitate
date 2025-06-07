@props(['productSeasonIds'])

<div class="form-groupe">
    <label class="seasons-checkbox">
      <input type="checkbox" name="seasons[]" value="1" {{ in_array(1, (array)$productSeasonIds) ? 'checked' : '' }}>春</label>
    <label class="seasons-checkbox">
      <input type="checkbox" name="seasons[]" value="2" {{ in_array(2, (array)$productSeasonIds) ? 'checked' : '' }}>夏</label>
    <label class="seasons-checkbox">
      <input type="checkbox" name="seasons[]" value="3" {{ in_array(3, (array)$productSeasonIds) ? 'checked' : '' }}>秋</label>
    <label class="seasons-checkbox">
      <input type="checkbox" name="seasons[]" value="4" {{ in_array(4, (array)$productSeasonIds) ? 'checked' : '' }}>冬</label>
</div>

