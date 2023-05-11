<h3>Filter op groep:</h3>
<div class="container flex">
    <div>
        <select id="groups">
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <select id="groups">
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>
</div>