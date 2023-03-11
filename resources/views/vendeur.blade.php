

        @include('layout/header')

        @if (session("notification"))
            <div class="notification">{{ session("notification") }}</div>
        @endif 

        <h3 class="vendeur">Vendeur : <span>{{ $vendeur->name }}</span></h3>
            
        @if (count($annonces) > 0)
        <div class="list-annonce">
            @foreach ($annonces as $annonce)
                <a class="annonce" href="/show/{{$annonce->id}}">
                    <h2>{{ $annonce->title }}</h2>
                    
                    <p class="desc">{{ $annonce->description }}</h3>
                   <div>
                    <p><ion-icon name="location-outline"></ion-icon><span>{{ $annonce->location }}</span></p>
                    <p class="price"><ion-icon name="pricetags-outline"></ion-icon><span>{{ $annonce->price }}</span> €</p>
                   </div>
                   <p>Le {{ date("d/m/Y", strtotime($annonce->updated_at)); }}</p>
                   
                </a>
            @endforeach
        </div>
        @else
           <p class="message">Il n'y a aucune annonce</p>
        @endif
       

        @include('layout/footer')


