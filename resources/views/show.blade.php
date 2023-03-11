
@include('layout/header')

@if (session("notification"))
    <div class="notification">{{ session("notification") }}</div>
@endif 

 <div class="annonce annonce-show">
    <a>
        <h2>{{ $annonce->title }}</h2>
        
        <p class="desc">{{ $annonce->description }}</h3>
        <div>
        <p><ion-icon name="location-outline"></ion-icon><span>{{ $annonce->location }}</span></p>
        <p class="price"><ion-icon name="pricetags-outline"></ion-icon><span>{{ $annonce->price }}</span> €</p>
        </div>
        
    </a>
    <h3>par <a href="/vendeur/{{ $annonce->name }}" class="name">{{ $annonce->name }}</a>, le {{ date("d/m/Y", strtotime($annonce->updated_at)); }}</h3>
</div>
@include('layout/footer')




