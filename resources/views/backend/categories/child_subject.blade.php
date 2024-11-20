@php
    $value = null;
    for ($i=0; $i < $child_subject->level; $i++){
        $value .= '--';
    }
@endphp
<option value="{{ $child_subject->id }}">{{ $value." ".$child_subject->getTranslation('name') }}</option>

@if ($child_subject->subject)
    @foreach ($child_category->subject as $childCategory)
        @include('subjects.child_subject', ['child_subject' => $childsubject])
    @endforeach
@endif