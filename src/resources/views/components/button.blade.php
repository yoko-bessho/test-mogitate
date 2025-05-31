@props(['label'])
<button type="submit" class="button button-primary">
    {{ $label }}
</button>

<style>
.button-primary {
    background-color: #f4c430;
    color: #333;
    width: 80%;
    margin: 10px;
}
</style>