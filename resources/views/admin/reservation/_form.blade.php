{{-- code utile pour débogger un formulaire et une validation qui ne fonctionnent pas correctement --}}
{{--
@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
--}}

@csrf
<div>
    <input type="text" name="nom" id="nom" placeholder="nom" class="@error('nom') is-invalid @enderror form-control" value="{{ old('nom', $data['nom']) }}">
    @error('nom')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <input type="tel" name="tel" id="tel" placeholder="tél" class="@error('tel') is-invalid @enderror form-control" value="{{ old('tel', $data['tel']) }}">
    @error('tel')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <input type="date" min="{{ $now->format('Y-m-d') }}" name="jour" id="jour" class="@error('jour') is-invalid @enderror form-control" value="{{ old('jour', $data['jour']) }}">
    @error('jour')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <input type="time" name="heure" id="heure" class="@error('heure') is-invalid @enderror form-control" value="{{ old('heure', $data['heure']) }}">
    @error('heure')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <input type="number" name="couverts" id="couverts" placeholder="couverts" class="@error('couverts') is-invalid @enderror form-control" value="{{ old('couverts', $data['couverts']) }}">
    @error('couverts')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <textarea name="commentaires" id="commentaires" cols="30" rows="10" placeholder="commentaires" class="@error('commentaires') is-invalid @enderror form-control">{{ old('commentaires', $data['commentaires']) }}</textarea>
    @error('commentaires')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <input type="radio" name="confirmation" id="confirmation_1" value="1" class="form-check-input" @if (old('confirmation', $data['confirmation']) == '1') checked @endif>
    <label for="confirmation_1" class="@error('confirmation') is-invalid @enderror form-check-label">
        Confirmé
    </label>
    <input type="radio" name="confirmation" id="confirmation_0" value="0" class="form-check-input" @if (old('confirmation', $data['confirmation']) == '0') checked @endif>
    <label for="confirmation_0" class="@error('confirmation') is-invalid @enderror form-check-label">
        Annulé
    </label>
    <input type="radio" name="confirmation" id="confirmation_null" value="null" class="form-check-input" @if (old('confirmation', $data['confirmation']) == 'null') checked @endif>
    <label for="confirmation_null" class="@error('confirmation') is-invalid @enderror form-check-label">
        En attente
    </label>
    @error('confirmation')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <button type="submit" class="btn btn-primary">Valider</button>
</div>
