<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard País</title>
</head>
<style>
    header, footer {
        background-color: #3F51B5;
        padding: 10px 30px;
        text-align: center;
        font-size: 35px;
        color: black;
    }
    header h1 {
        margin: 0;
        font-size: 24px;
        flex-grow: 1;
        text-align: right;
        padding: 5px 30px;
    }

    footer h1 {
        margin: 0; 
        color: white; 
        font-size: 14px;
    }

    footer, footer p {
        font-size: 12px; 
        color: white; 
    }

    .header-grid-item {
        background-color: #F8F9FA;
        padding: 2px 0;
        min-height: 40px; 
        width: auto; 
        border-radius: 8px;
        border: 1px solid #999999;
        
        
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .header-grid-link {
        color: #333;
        font-weight: bold;
        /* Reduït a 12px */
        font-size: 12px; 
        text-decoration: none;
    }

    .hf-text-button {
        margin: 0;
        font-weight: bold;
        font-size: 14px; 
        color: #F8F9FA;
        align-items: center;
        display: block;
        width: 100%;
        padding: 5px 0; 
        margin-top: 5px;
        background-color: #B3D8FF;
        border: #007BFF;
        cursor: pointer;
    }

    .row {
        display: flex;
        align-items: center;
        gap: 15px;
        border: none;
        margin-top: 40px;
        width: 100%; 
        justify-content: flex-start; 
        flex-wrap: nowrap; 
    }

    .hf-button-row { 
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        gap: 15px; 
        padding: 15px;
        margin-top: 40px;
        width: fit-content; 
        justify-content: flex-start;
        margin-right: auto;
        margin-left: 0;
    }
</style>
<body>
    <header>
        <div class="row hf-button-row"> 
            <div class="header-grid-item">
                <a href="{{ url()->previous() }}" class="header-grid-link">Volver</a>
            </div>
            
            <div class="header-grid-item">
                <a href="{{ route('main_dashboard.index') }}" class="header-grid-link">Dashboard</a>
            </div>

            <h1>Dashboard {{ $country_name }}</h1>

            <div style="flex-grow: 1;"></div> 
            <div class="header-grid-item">
                <a href="{{ route('profile.index') }}" class="header-grid-link">Perfil</a>
            </div>
            
            <div class="header-grid-item">
                <a href="{{ route('favorities.index') }}" class="header-grid-link">Favoritos</a>
            </div>
            
            <div class="header-grid-item">
                <a href="{{ route('main_dashboard.index') }}" class="header-grid-link">[imagen cerar sesión]</a>
            </div>     
        </div>
    </header>
    <hr>
    <div class="main-content">
        @yield('content') 
    </div>
    <hr>
    <hr>
    <footer>
        <div class="row hf-button-row">
            <div style="display: flex; gap: 15px; align-items: center;">
                <p>[logo de la página web]</p>
                <p>© 2025</p>
                <div class="header-grid-item">
                    <a href="{{ route('about_us.index') }}" class="header-grid-link">Sobre nosotros</a>
                </div>
                <div class="header-grid-item">
                    <a href="{{ route('web_info.index') }}" class="header-grid-link">Info de la web</a>
                </div>
                <div class="header-grid-item">
                    <a href="{{ route('contact_form.index') }}" class="header-grid-link">Contáctanos</a>
                </div>
            </div>
        </div>
    </footer> 
</body>
</html>