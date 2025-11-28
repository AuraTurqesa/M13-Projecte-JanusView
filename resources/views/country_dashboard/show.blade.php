@extends('country_dashboard.layout')

@section('content')
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 10px;
        row-gap: 20px;
        padding: 10px;
        background-color: white;
    }

    .grid-item {
        background-color: #F8F9FA;
        padding: 10px;
        min-height: 150px; 
        border-radius: 8px;
        border: 1px solid #999999;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        color: #333;
        font-size: 14px; 
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .grid-item p {
        margin: 0;
        line-height: 1.1;
        font-weight: bold;
    }

    .graph-area {
        width: 100%;
        height: 70%; 
        background-color: #CCCCCC; 

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px; 
        color: black;
        padding-bottom: 5px; 
    }

    .country-button {
        margin: 0;
        line-height: 1.1;
        font-weight: bold;
        font-size: 14px; 
        color: #333;
        text-decoration: none;

        display: block;
        width: 100%;
        padding: 8px 0; 
        background-color: transparent;
        border: #007BFF;
        cursor: pointer;
    }

    .country-button::hover {
        background-color: #B3D8FF;
    }
    
    .row {
        display: flex;
        align-items: center;
        gap: 15px;
        border: none;
        margin-top: 40px;
        width: 100%; 
        justify-content: flex-start; 
        flex-wrap: wrap; 
    }

    .comparison-row {
        border: 2px solid black; 
        border-radius: 10px;
        padding: 15px;
        margin-top: 40px;
        
        width: fit-content; 
        justify-content: flex-start;
        margin-right: auto;
        margin-left: 0;
    }

    .comparison-row .grid-item {
        width: 180px; 
        flex-shrink: 0; 
    }

    .data-group { 
        border: 2px solid #555; 
        border-radius: 10px;
        padding: 15px;
        margin-top: 40px;
        width: fit-content; 
        justify-content: flex-start;
        margin-right: auto;
        margin-left: 0;
    }

    .data-group .grid-item {
        width: 180px; 
        flex-shrink: 0; 
    }
    
    .dropbutton {
        border: 2px solid transparent;
        background-color: #B3D8FF;
        color: black;
        font-size: 16px; 
        font-family: 'Roboto';
        cursor: pointer;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
    }

    .dropbutton:hover {
        color: #3F51B5;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        width: 90%;
        max-width: 550px;
    }

    .modal-content h3 {
        margin-top: 0;
    }

    .form-group-flex {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .form-group-flex > label {
        flex-shrink: 0;
        width: 100px; 
        margin-top: 5px;
        font-weight: bold;
    }

    .checkbox-group {
        flex-grow: 1;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 5px;
        max-height: 150px;
        overflow-y: auto;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .checkbox-item label {
        margin-left: 8px;
        font-weight: normal;
        cursor: pointer;
    }

    .checkbox-item input[type="checkbox"] {
        cursor: pointer;
    }

    .modal-content label:not(.checkbox-item label) {
        display: block;
        margin-bottom: 5px;
    }
</style>

<div class="container"> 
    
    <h2 style="margin-top: 30px;">Comparaciones</h2>
    <div class="row data-group">
        <div class="grid-item">
            <div class="graph-area">
                <p>Gráfico</p>
            </div>
            <a href="#" class="country-button" onclick="openComparisonModal(event, 'Comparar categorías')">Comparar categorías</a>
        </div>
        
        <div class="grid-item">
            <div class="graph-area">
                <p>Gráfico</p>
            </div>
            <a href="#" class="country-button" onclick="openComparisonModal(event, 'Comparar países')">Comparar países</a>
        </div>

        <div class="grid-item">
            <div class="graph-area">
                <p>Gráfico</p>
            </div>
            <a href="#" class="country-button" onclick="openComparisonModal(event, 'Comparar años')">Comparar años</a>
        </div>
    </div>
    
    <hr>

    <h2 style="margin-top: 30px;">Explorar por Categoría</h2>
    <div class="row comparison-row">
        @foreach ($allCategories as $category)
        <div class="grid-item">
            <div class="graph-area">
                Gráfico
            </div>
            <a href="#" class="country-button" onclick="openComparisonModal(event, '{{ $category->Category_name }}')">{{ $category->Category_name }}</a>
        </div>
        @endforeach
    </div>
</div>

<div id="comparison-modal" class="modal-overlay">
    <div class="modal-content">
        <h3 id="modal-title">Selección</h3>
        
        <p>Seleccione la/s categoría/s, el/los país/es y el/los año/s de los que desee obtener datos</p>
        
        <form action="#" method="GET">
            
            <div class="form-group-flex">
                <label>País/es:</label>
                <div id="country-selector" class="checkbox-group">
                    @foreach ($allCountries as $country)
                        @php
                            $countryName = $country->Country_name ?? $country->country;
                        @endphp
                        <div class="checkbox-item">
                            <input 
                                type="checkbox" 
                                id="country_{{ $loop->index }}" 
                                name="selected_countries[]" 
                                value="{{ $countryName }}" 
                                @if ($countryName === $country_name) 
                                    checked 
                                @endif
                            >
                            <label for="country_{{ $loop->index }}">{{ $countryName }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="form-group-flex">
                <label>Categoría/s:</label>
                <div id="category-selector" class="checkbox-group">
                    @foreach ($allCategories as $category)
                        <div class="checkbox-item">
                            <input 
                                type="checkbox" 
                                id="category_{{ $loop->index }}" 
                                name="selected_categories[]" 
                                value="{{ $category->Category_name }}"
                            >
                            <label for="category_{{ $loop->index }}">{{ $category->Category_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="form-group-flex">
                <label>Año/s:</label>
                <div id="year-selector" class="checkbox-group">
                    @foreach ($allYears as $year) 
                        @php
                            $yearValue = $year->Year_name ?? $year->year;
                        @endphp
                        <div class="checkbox-item">
                            <input 
                                type="checkbox" 
                                id="year_{{ $loop->index }}" 
                                name="selected_years[]" 
                                value="{{ $yearValue }}"
                            >
                            <label for="year_{{ $loop->index }}">{{ $yearValue }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <input type="hidden" id="selected-topic" name="topic" value="">
            
            <button type="submit" class="dropbutton" style="margin-right: 10px; margin-top: 15px;">Continuar</button>
            <button type="button" class="dropbutton" onclick="closeComparisonModal()">Cancelar</button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('comparison-modal');
    const modalTitle = document.getElementById('modal-title');
    const topicInput = document.getElementById('selected-topic');
    const categorySelectorDiv = document.getElementById('category-selector');
    const yearSelectorDiv = document.getElementById('year-selector');

    function openComparisonModal(event, topic) {
        event.preventDefault();
        
        modalTitle.textContent = `Selección`;
        topicInput.value = topic;

        if (yearSelectorDiv) {
            yearSelectorDiv.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
        }
        
        const categoryCheckboxes = categorySelectorDiv.querySelectorAll('input[type="checkbox"]');
        categoryCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });

        if (categorySelectorDiv) {
            const selectedCheckbox = categorySelectorDiv.querySelector(`input[value="${topic}"]`);
            if (selectedCheckbox) {
                selectedCheckbox.checked = true;
            }
        }

        modal.style.display = 'flex'; 
        
        document.getElementById('country_0').focus();
    }

    function closeComparisonModal() {
        modal.style.display = 'none';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeComparisonModal();
        }
    });
</script>
@endsection