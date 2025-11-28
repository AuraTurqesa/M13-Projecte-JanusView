<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex-grow: 1;
        padding: 20px 0;
    }

    header, footer {
        background-color: #3F51B5;
        padding: 10px 30px;
        text-align: center;
        color: black;
    }
    
    header h1 {
        margin: 0;
        font-size: 24px;
        text-align: center;
        padding: 5px 30px;
        color: black;
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
        font-size: 12px; 
        text-decoration: none;
        padding: 0 10px;
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
        margin-top: 0;
        width: 100%;
        justify-content: flex-start;
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

            <div style="flex-grow: 1;"></div> 

            <h1>Formulario de contacto</h1>

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
    
    <div class="main-content">
        <hr> 
        @yield('content') 
        <hr> 
        <hr> 
    </div>
    
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
                    <p class="header-grid-link">Contáctanos</p>
                </div>
            </div>
        </div>
    </footer> 
</body>
</html>