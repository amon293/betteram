<div class="ui labeled icon fluid six massive item menu">
    <a class="item">
        <i class="gamepad icon"></i>
        Hangar
    </a>
    <a class="item">
        <i class="video camera icon"></i>
        Human Resources
    </a>
    <a class="item">
        <i class="add to calendar icon"></i>
        Accounting And Management
    </a>
    <a class="item">
        <i class="dashboard icon"></i>
        Catering
    </a>

    <div class="ui pointing dropdown link item">
        <i class="plane icon"></i>
        <span class="text">Routes & Airports</span>
        <div class="menu">
            <a href="{{ route("airports") }}" class="item">Airports</a>
            <a href="{{ route("routes") }}" class="item">Routes</a>
        </div>
    </div>

    <div class="ui pointing dropdown link item">
        <i class="shopping bag icon"></i>
        <span class="text">Shopping</span>
        <div class="menu">
            <div class="header">Airplanes</div>
            <div class="item">
                <i class="dropdown icon"></i>
                <span class="text">Models</span>
                <div class="left menu">
                    <div class="header">Model 1</div>
                    <div class="header">Model 2</div>
                    <div class="header">Model ...</div>
                </div>
            </div>
            <a href="{{ route('user.shopping.index') }}" class="item">Purchase Airplanes</a>
            <div class="divider"></div>
            <div class="header">Something...</div>
            <div class="item">Gasoline</div>
        </div>
    </div>
</div>
