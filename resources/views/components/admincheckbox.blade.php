<style scoped>
    :root {
  --color-one: #52117d;
  --color-two: #a944ec;
  --color-three: #ffc800;
  --color-accent: #666673;
  --color-text: ##414051;
}

.lns-checkbox {
  display: inline-flex;
  color: var(--color-text);
  font-size: 0.5rem;
  font-weight: 200;
  align-items: center;
  line-height: 1;
  border-radius: 5px;
  padding: 5px 7px 5px 7px;
  user-select: none;
  margin-top:5px;
}

@media (min-width: 692px) {
  .lns-checkbox {
    font-size: 0.9rem;
  }
}

.lns-checkbox span {
  position: relative;
  display: flex;
  align-items: center;
}

.lns-checkbox input[type="checkbox"] {
  position: absolute;
  clip: rect(0.5px, 0.5px, 0.5px, 0.5px);
  padding: 0;
  border: 0;
  height: 0.5px;
  width: 0.5px;
  overflow: hidden;
}

.lns-checkbox input[type="checkbox"]:checked + span::after {
  background-color: var(--color-accent);
}

.lns-checkbox input[type="checkbox"]:checked + span {
  color: var(--color-accent);
}

.lns-checkbox input[type="checkbox"]:focus + span::before {
  border-color: var(--color-accent);
}

.lns-checkbox span::before {
  content: "";
  display: inline-block;
  border-radius: 2px;
  background-color: #222021;
  margin-right: 8px;
  height: 12px;
  width: 12px;
  border: 1px solid transparent;
}

.lns-checkbox span::after {
  content: "";
  display: inline-block;
  height: 10px;
  width: 10px;
  border-radius: 2px;
  background-color: transparent;
  left: 2px;
  position: absolute;
}

</style>
@props(['data', 'dataSource'])
<div class='col-md-6'>
@forelse ($data as $item)
    <label class="lns-checkbox ml-2" style="background-color:{{$item->color}};">
    <input type="checkbox">
    <span>{{ $item->name }}</span>
  </label> 
    @empty
        <p>No tags found</p>
    @endforelse

</div>