@props(['label'])

<button class="button button-primary" type="submit">
    {{ $label }}
</button>

<style>
.button-primary {
    background-color: #f4c430;
    color: #333;
    width: 80%;
    margin: 10px;
    text-align: center;
}
</style>