<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/caraguino.png')}}" />
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <title>GUINO</title>
</head>

<body>
  <header>
    <nav class="header__nav">
      <div class="header__logo">
        <h4 data-aos="fade-down">GÜINO</h4>
        <div class="header__logo-overlay"></div>
      </div>

      <ul class="header__menu" data-aos="fade-down">
        <li>
          <a href="#about-us">Quienes somos</a>
        </li>
        <li>
          <a href="#pro">Profesionales</a>
        </li>
        <li>
          <a href="#topics">Tópicos</a>
        </li>
        <li>
          <a href="#memb">Membresía</a>
        </li>
      </ul>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-image">
      <img src="{{ asset('assets/pen.png')}}" alt="penguin" data-aos="fade-up" />
      <h2 data-aos="fade-up">
        G <br />
        Ü <br />
        I <br />
        N <br />
        O
      </h2>

      <div class="hero-image__overlay"></div>
    </div>

    <div class="hero-content">
      <div class="hero-content-info" data-aos="fade-left">
        <h1>Bienvenido a Güino: <span style="color: #3F51B5;">Aprende de la Comunidad</span></h1>
        <p>Guino es tu plataforma para aprender y crecer junto a una comunidad apasionada. Únete a nosotros y descubre un mundo de conocimiento.</p>
        <div class="hero-content__buttons">
          <a class="hero-content__order-button" href="home">Únete a la Comunidad Güino</a>
        </div>
      </div>

      <div class="hero-content__testimonial" data-aos="fade-up">
        <div class="hero-content__customer flex-center">
          <h4>200<span>+</span></h4>
          <p>Clientes</p>
        </div>

        <div class="hero-content__review">
          <img src="{{ asset('assets/user.png')}}" alt="user" />
          <p>"Guino es genial. La membresía premium es clave. ¡Altamente recomendado!"</p>
        </div>
      </div>
    </div>
  </section>

  <section class="about-us" id="about-us">
    <div class="about-us__image">
      <div class="about-us__image-sushi3">
        <img src="{{ asset('assets/penguin2.png')}}" alt="sushi" data-aos="fade-right" />
      </div>

      <button class="about-us__button">
        Saber más

        <img src="{{ asset('assets/arrow-up-right.svg')}}" alt="learn more" />
      </button>

      <div class="about-us__image-sushi2">
        <img src="{{ asset('assets/penguin3.png')}}" alt="sushi" data-aos="fade-right" />
      </div>
    </div>

    <div class="about-us__content" data-aos="fade-left">
      <h3 class="sushi__title" style="color: #3F51B5;">Quienes Somos</h3>
      <p class="sushi__description">"En Guino, creemos en el poder del aprendizaje colectivo. Somos una comunidad que se dedica a fomentar el conocimiento compartido a través de preguntas y respuestas."
      </p>
      <p class="sushi__description">"Nuestra misión es conectar a personas apasionadas por aprender y crear un espacio donde puedan hacer preguntas, obtener respuestas de profesionales y enriquecer sus vidas."
      </p>
    </div>
  </section>

  <section class="popular-foods" id="pro">
    <h2 class="popular-foods__title" data-aos="flip-up">Profesionales</h2>

    <div class="popular-foods__filters sushi__hide-scrollbar" data-aos="fade-up">
      <button class="popular-foods__filter-btn">
        <img src="{{ asset('assets/photo1.png')}}" alt="sushi 9" />
        María Rodríguez
      </button>
      <button class="popular-foods__filter-btn">
        <img src="{{ asset('assets/photo2.png')}}" alt="sushi 8" />
        Carlos Sánchez
      </button>
      <button class="popular-foods__filter-btn">
        <img src="{{ asset('assets/photo3.png')}}" alt="sushi 7" />
        Laura Martínez
      </button>
      <button class="popular-foods__filter-btn">
        <img src="{{ asset('assets/photo4.png')}}" alt="sushi 6" />
        Sofia González
      </button>
    </div>

    <div class="popular-foods__catalogue" data-aos="fade-up">
      <article class="popular-foods__card">
        <img class="popular-foods__card-image" src="{{ asset('assets/photo5.png')}}" alt="sushi-12" />
        <h4 class="popular-foods__card-title">Ana Pérez</h4>

        <div class="popular-foods__card-details flex-between">
          <div class="popular-foods__card-rating">
            <img src="{{ asset('assets/star.svg')}}" alt="star" />
            <p>4.9</p>
          </div>

          <p class="popular-foods__card-price">Tecnología</p>
        </div>
      </article>

      <article class="popular-foods__card active-card">
        <img class="popular-foods__card-image" src="{{ asset('assets/photo6.png')}}" alt="sushi-11" />
        <h4 class="popular-foods__card-title">Javier López</h4>

        <div class="popular-foods__card-details flex-between">
          <div class="popular-foods__card-rating">
            <img src="{{ asset('assets/star.svg')}}" alt="star" />
            <p>5.0</p>
          </div>

          <p class="popular-foods__card-price">Ciencias</p>
        </div>
      </article>

      <article class="popular-foods__card">
        <img class="popular-foods__card-image" src="{{ asset('assets/photo7.png')}}" alt="sushi-10" />
        <h4 class="popular-foods__card-title">Antonio Pérez</h4>

        <div class="popular-foods__card-details flex-between">
          <div class="popular-foods__card-rating">
            <img src="{{ asset('assets/star.svg')}}" alt="star" />
            <p>4.7</p>
          </div>

          <p class="popular-foods__card-price">Historia</p>
        </div>
      </article>
    </div>

    <p class="sushi__description" style="color: white; text-align: center;">"En Guino, nos enorgullece contar con un equipo de profesionales dedicados en una amplia variedad de campos. Están aquí para garantizar la calidad de las respuestas y el aprendizaje de la comunidad."
    </p>
  </section>

  <section class="trending" id="topics">
    <section class="trending-sushi">
      <div class="trending__content" data-aos="fade-right">
        <p class="sushi__subtitle">Tópicos</p>

        <h3 class="sushi__title">Explora Nuestros Temas
        </h3>
        <p class="sushi__description">"En Guino, cubrimos una amplia gama de temas. Desde tecnología hasta arte, ciencia, salud y más. Aquí encontrarás respuestas a todas tus preguntas."
        </p>

        <ul class="trending__list flex-between">
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Tecnología</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Salud y Bienestar</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Historia</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Arte y Cultura</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Estilo de Vida</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Medio Ambiente</p>
          </li>
        </ul>
      </div>

      <div class="trending__image flex-center">
        <img src="{{ asset('assets/topic.png')}}" alt="sushi-5" data-aos="fade-left" />

        <div class="trending__arrow trending__arrow-left">
          <img src="{{ asset('assets/arrow-vertical.svg')}}" alt="arrow vertical" />
        </div>

        <div class="trending__arrow trending__arrow-bottom">
          <img src="{{ asset('assets/arrow-horizontal.svg')}}" alt="arrow horizontal" />
        </div>
      </div>

    </section>

    <div class="trending__discover" data-aos="zoom-in">
      <p>Descubrir</p>
    </div>

    <section class="trending-drinks">
      <div class="trending__image flex-center">
        <img src="{{ asset('assets/topic2.png')}}" alt="sushi-4" data-aos="fade-right" />

        <div class="trending__arrow trending__arrow-top">
          <img src="{{ asset('assets/arrow-horizontal.svg')}}" alt="arrow horizontal" />
        </div>

        <div class="trending__arrow trending__arrow-right">
          <img src="{{ asset('assets/arrow-vertical.svg')}}" alt="arrow vertical" />
        </div>
      </div>

      <div class="trending__content" data-aos="fade-left">

        <h3 class="sushi__title">Explora Nuestros diversos Temas
        </h3>
        <p class="sushi__description">"En Guino, estamos comprometidos en brindarte un amplio abanico de temas que abarcan todos los ámbitos del conocimiento. Desde la ciencia hasta la cultura, estamos aquí para responder tus preguntas y fomentar el aprendizaje compartido."
        </p>

        <ul class="trending__list flex-between">
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Viajes y Aventuras</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>
              Emprendimiento</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Deportes</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Nutrición</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Literatura</p>
          </li>
          <li>
            <div class="trending__icon flex-center">
              <img src="{{ asset('assets/check.svg')}}" alt="check" />
            </div>
            <p>Música</p>
          </li>
        </ul>
      </div>
    </section>
  </section>

  <section class="subscription flex-center" id="memb">
    <h2 data-aos="flip-down">
      Únete a Nuestra Membresía
    </h2>
    <p style="text-align: center;">"Accede a beneficios exclusivos y maximiza tu experiencia en Guino con nuestra membresía premium. Obtén vidas ilimitadas, contenido exclusivo y más."</p>

    <div class="subscription__form">
      <button>Obtén tu Membresía Premium</button>
    </div>
  </section>

  <footer class="footer flex-between">
    <h3 class="footer__logo">
      <span>GÜINO</span>
    </h3>

    <ul class="footer__nav">
      <li><a href="#about-us">Quienes Somos</a></li>
      <li><a href="#pro">Profesionales</a></li>
      <li><a href="#topics">Tópicos</a></li>
      <li><a href="#memb">Membresía</a></li>
    </ul>

    <ul class="footer__social">
      <li class="flex-center">
        <img src="{{ asset('assets/facebook.svg')}}" alt="facebook" />
      </li>
      <li class="flex-center">
        <img src="{{ asset('assets/instagram.svg')}}" alt="instagram" />
      </li>
      <li class="flex-center">
        <img src="{{ asset('assets/twitter.svg')}}" alt="twitter" />
      </li>
    </ul>
  </footer>
</body>

</html>