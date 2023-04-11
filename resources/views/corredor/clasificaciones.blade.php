<h2>Clasificación por género</h2>
<h3>Hombres</h3>
    @foreach($masculino as $m)
        {{$m->name." ".$m->last_name}}
        {{$m->points}}
    @endforeach
<h3>Mujeres</h3>
    @foreach($femenino as $f)
        {{$f->name." ".$f->last_name}}
        {{$f->points}}
    @endforeach
<h2>Clasificación por edad</h2>

@php
    $groups = [
        'master20' => [],
        'master30' => [],
        'master40' => [],
        'master50' => [],
        'master60' => []
    ];

    foreach($runners as $runner) {
        $edad = now()->diff($runner->birth_date)->y;
        if ($edad > 19 && $edad <= 29) {
            $groups['master20'][] = $runner;
        } elseif ($edad > 29 && $edad <= 39) {
            $groups['master30'][] = $runner;
        } elseif ($edad > 39 && $edad <= 49) {
            $groups['master40'][] = $runner;
        } elseif ($edad > 49 && $edad <= 59) {
            $groups['master50'][] = $runner;
        } elseif ($edad > 59 && $edad <= 69) {
            $groups['master60'][] = $runner;
        }
    }
@endphp

@for ($i = 0; $i < count($groups); $i++)
    @if (!empty($groups['master20']) && $i == 0)
        <h3>MASTER 20</h3>
        @foreach($groups['master20'] as $runner)
            {{ $runner->name." ".$runner->last_name}}
            {{now()->diff($runner->birth_date)->y }}
            {{$runner->points}}<br>
        @endforeach
    @elseif (!empty($groups['master30']) && $i == 1)
        <h3>MASTER 30</h3>
        @foreach($groups['master30'] as $runner)
            {{ $runner->name." ".$runner->last_name}}
            {{now()->diff($runner->birth_date)->y }}
            {{$runner->points}}<br>
        @endforeach
    @elseif (!empty($groups['master40']) && $i == 2)
        <h3>MASTER 40</h3>
        @foreach($groups['master40'] as $runner)
            {{ $runner->name." ".$runner->last_name}}
            {{now()->diff($runner->birth_date)->y }}
            {{$runner->points}}<br>        @endforeach
    @elseif (!empty($groups['master50']) && $i == 3)
        <h3>MASTER 50</h3>
        @foreach($groups['master50'] as $runner)
            {{ $runner->name." ".$runner->last_name}}
            {{now()->diff($runner->birth_date)->y }}
            {{$runner->points}}<br>        @endforeach
    @elseif (!empty($groups['master60']) && $i == 4)
        <h3>MASTER 60</h3>
        @foreach($groups['master60'] as $runner)
            {{ $runner->name." ".$runner->last_name}}
            {{now()->diff($runner->birth_date)->y }}
            {{$runner->points}}<br>
        @endforeach
    @endif
@endfor