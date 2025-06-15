@csrf
<input type="hidden" name="fecha" value="{{ old('fecha', $fechaSeleccionada ?? '') }}">
<div class="mb-4">
    <label for="hora" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i class="fas fa-clock"></i>
        Hora:</label>
    <select name="hora" id="hora" required
        class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]">
        <option value="" disabled {{ old('hora', $cita->hora ?? '') == '' ? 'selected' : '' }}>-- Selecciona una hora --
        </option>
        @foreach ($horarios_filtrados as $hora)
            <option value="{{ $hora }}" {{ old('hora', $cita->hora ?? '') == $hora ? 'selected' : '' }}>{{ $hora }}</option>
        @endforeach
    </select>
    @error('hora')
        <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>
            {{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="nombre_cliente" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i
            class="fas fa-user"></i> Nombre del cliente:</label>
    <input type="text" id="nombre_cliente" name="nombre_cliente"
        value="{{ old('nombre_cliente', auth()->user()->name) }}" readonly
        class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
</div>
<div class="mb-4">
    <label for="corte_cabello" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i
            class="fas fa-cut"></i> Corte de cabello:</label>
    <select name="corte_cabello" id="corte_cabello" required
        class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]">
        <option value="" disabled {{ old('corte_cabello', $cita->corte_cabello ?? '') == '' ? 'selected' : '' }}>--
            Selecciona un corte --</option>
        @foreach ($opcionesCorteCabello as $corte)
            <option value="{{ $corte }}" {{ old('corte_cabello', $cita->corte_cabello ?? '') == $corte ? 'selected' : '' }}>
                {{ $corte }}
            </option>
        @endforeach
    </select>
    @error('corte_cabello')
        <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>
            {{ $message }}</p>
    @enderror
</div>