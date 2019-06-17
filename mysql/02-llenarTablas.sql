-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2019 a las 19:25:10
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`NombreEvento`, `ID_Usuario`, `Titulo`, `Contenido`) VALUES
('BilbApp 3ª Edición', '7', 'Una pena', 'Me gustaría asistir pero desde villaverde me coje un poco lejos.'),
('Blockchain exe', '2', 'Primera prueba', 'contenido contenido contenido'),
('Blockchain exe', '3', 'Buen precio', 'Por el contenido que van a ofrecer, ¡va a estar genial por su precio!'),
('Blockchain exe', '6', 'Emocionado', 'Que buena pinta tiene este evento'),
('Campus Experts Summit', '5', 'Muy contenta', 'Con muchas ganas de volver, el año pasado estuvo genial.'),
('Content', '7', 'Tiene buena pinta', 'Visitaré Valencia así que no dudaré en pasar por ahí');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID_Empresa`, `email`, `password`, `Nombre`, `Localizacion`, `Sector`, `Oficio`, `Fase`, `Img_Empresa`, `cartaPresentacion`, `ofrecemos`, `buscamos`, `numLikes`) VALUES
('2', 'reparatech@gmail.com', 'f033f567382a7c044209c8bfedb0e1b05b41c2aa', 'ReparaTech', 'Madrid', 'Tecnología', 'Marketing', 'Expansion', 'img/reparatech.jpg', 'Somos una empresa nueva que buscamos hacernos un hueco en el mundo de la tecnología.\r\nNos dedicamos a ofrecer el servicio de reparación de tecnología a través de plataformas modernas.\r\nNos consideramos el &quot;Uber de las reparaciones&quot;.', 'Ofrecemos la posibilidad de que nuestros empleados sientan que realizan un servicio útil para aquellos que tengan pocos conocimientos sobre tecnología de forma justa, fiable y rápida.', 'Buscamos trabajadores para rellenar varios puestos de reparador de ordenadores de sobremesa y dos para dispositivos móviles.\r\nBuscamos también a un encargado de marketing para llevar las nuevas campañas publicitarias, así como un encargado de ventas.', 4),
('3', 'simplysmart@gmail.com', 'a21dd8e2136bfb9902d566d7a0f31905119da048', 'SimplySmart', 'Madrid', 'Tecnología', 'CTO', 'Expansion', 'img/simplysmart.jpg', 'En SimplySmart transformamos las casas de nuestros clientes en casas inteligentes completamente controlables por voz y monitorizables desde el smartphone.\r\nTrabajamos con distintos presupuestos dependiendo del nivel de transformación que desee el cliente.', 'Ofrecemos la posibilidad de trabajar en el mundo del IoT en una empresa que trata con este sector de forma directa. Además tratarás mano a mano con expertos en la transformación de viviendas.', 'Buscamos un CTO para investigación en el mundo de IoT ya que pretendemos lanzar nuestro propio hub de tecnologías IoT para poder acoger diferentes tecnologías y presentarlas al cliente de forma fácilmente controlable, con un programa hecho in-house.', 2),
('4', 'travelmore@gmail.com', '1ab96373b03439029a078c064091abf6f913eaa8', 'TravelMore', 'Valencia', 'Turismo', 'Programadores', 'Early-Stage', 'img/travelmore.jpg', 'TravelMore es una agencia de viajes completamente online, que basa sus servicios en buscar los mejores precios para sus clientes buscando en las mayores webs de servicios para viajeros a través de un motor con inteligencia artificial.', 'Ofrecemos un ambiente de trabajo agradable y joven, con energía para afrontar nuevos desafíos. Somos un equipo de 4 personas así que te sentirás como en casa.', 'Buscamos programadores para continuar con el desarrollo de nuestra herramienta, así como mejorar y mantener la página web y aplicación.', 5),
('5', 'triwater@gmail.com', 'c3070c6fadc86c125256e32b05745508ae7bc491', 'Triwater', 'Madrid', 'Medioambiente', 'Marketing', 'Growth Stage', 'img/imgS5.jpg', 'Triwater produce filtros biodegradables que de forma sencilla transforma agua salada, sucia o con bacterias en agua completamente potable en tres sencillos pasos.', 'Ofrecemos un ambiente de trabajo agradable y joven, con energía para afrontar nuevos desafíos. Somos un equipo de 12 personas así que te sentirás como en casa.', 'Buscamos un presidente de marketing y dos programadores para desarrollar una nueva web.', 0),
('6', 'snau@gmail.com', 'e40e3bd7c1d936924f5a0880a4da2fae996c48cc', 'Snau', 'Madrid', 'Mascotas', 'CTO', 'Expansion', 'img/imgS6.jpg', 'Snau.es es un plataforma que conecta a los dueños de perros con la comunidad más grande de amantes de mascotas para realizar los servicios de paseo, cuidado, adiestramiento y peluquería. Fundada en Junio de 2016', 'Ofrecemos un entorno de trabajo perfecto para cualquier persona joven que le encante el mundo de los animales.', 'Buscamos a Jefes de tecnologia para desarrollar una app basada en las funcionalidades de nuestra web.', 0),
('7', 'dribo@gmail.com', '7147cd04aca582b6d4cab2e2d5979bdbab637273', 'Dribo', 'Barcelona', 'Tecnología', 'UX Designer', 'Growth Stage', 'img/imgS7.jpg', 'Dribo is the first Startup that disrupts the way users obtain their driving license. All in a 100% mobile process, without attending to lessons in driving schools and in a faster, kinder and more affordable way.', 'Ofrecemos un trabajo flexible para desarrollar desde casa o nuestras nuevas oficinas en la barceloneta el diseño de nuestra nueva app.', 'Buscamos a varios diseñadores para pasar al siguiente nivel el desarrollo de nuestra aplicación en IOS y Android.', 1),
('8', 'housell@gmail.com', '6f688a0c0fcff918a249339327d3ae56a4cf8d84', 'Housell', 'Valencia', 'Vivienda', 'Programadores', 'Expansion', 'img/imgS8.jpg', 'Housell es la compañía tecnológica de servicios inmobiliarios que está revolucionando la forma de hacer negocios en el sector. Líder en ventas de inmuebles aúna lo mejor del mundo físico y digital.', 'Ofrecemos un buen ambiente de trabajo con un gran equipo que cada vez crece más.\r\nAdemás participamos en numerosos actos beneficos.', 'Buscamos a programadores desde Angular hasta Java, para tanto la web como la aplicación. \r\nEstaremos encantado de cualquier tipo de nivel.', 0),
('9', 'travelperk@gmail.com', '4d8e5a25845052a0b022f286508bf46757687edb', 'TravelPerk', 'Barcelona', 'Turismo', 'Marketing', 'Growth Stage', 'img/imgS9.jpg', 'TravelPerk is the next-generation business travel platform pioneering the future of business travel. TravelPerk’s all-in-one platform gives travelers the freedom they want whilst providing companies with the control they need.', 'Ofrecemos un buen salario junto a un buen equipo con el que desarrollar las ideas.', 'Buscamos expertos en marketing para llevar nuestra genial idea a más mercados de forma fácil.\r\nNecesitamos marketing bueno en redes sociales.', 1);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`Nombre`, `Localizacion`, `Precio`, `Cantidad`, `Fecha`, `Img_Evento`) VALUES
('BilbApp 3ª Edición', 'Bilbao', 'Gratis', 250, '2019-05-24', 'bilbapp.jpg'),
('Blockchain exe', 'Madrid', '20 €', 350, '2019-05-31', 'blockchain.jpg'),
('Campus Experts Summit', 'Madrid', 'Gratis', 300, '2019-07-04', 'campus.jpg'),
('Content', 'Valencia', 'Gratis', 250, '2019-06-07', 'content.jpg'),
('Demium startups pitch', 'Madrid', 'Gratis', 100, '2019-03-17', 'demium.jpg'),
('EU-StartUps Summit', 'Barcelona', '50 €', 650, '2019-06-21', 'eu.jpg'),
('Full Funnel B2B Markting Conference', 'Valencia', '20 €', 500, '2019-04-03', 'B2B.jpg'),
('Infaimon Vision Congress', 'Barcelona', '15 €', 600, '2019-06-22', 'infaimon.jpg'),
('Jenni', 'Valencia', '15', 4, '2019-05-03', '../img/event.png'),
('papapa', 'Barcelona', 'Gratis', 5, '2019-05-17', '../img/event.png'),
('Payoneer Meetup', 'Barcelona', 'Gratis', 200, '2019-07-11', 'payoneer.jpg'),
('salalas', 'Madrid', '15', 3, '2019-05-18', '../img/event.png'),
('Sesame summit', 'Valencia', 'Gratis', 500, '2019-04-04', 'sesame.jpg'),
('Sopela business market', 'Bilbao', 'Gratis', 250, '2019-04-19', 'sopela.jpg'),
('StartUp my rooftop', 'Barcelona', 'Gratis', 150, '2019-05-10', 'rooftop.jpg'),
('Startup Week Bilbao', 'Bilbao', 'Gratis', 325, '2019-03-04', 'startupweek.jpg'),
('StartUp Weekend TechStars', 'Valencia', 'Gratis', 250, '2019-05-17', 'startupweekend.jpg'),
('TechF3st UC3M', 'Madrid', 'Gratis', 750, '2019-03-14', 'tech.jpg'),
('Venture on the road', 'Bilbao', '15 €', 300, '2019-05-24', 'venture.jpg');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `interaccion_emp_us`
--

INSERT INTO `interaccion_emp_us` (`ID_Empresa`, `ID_Usuario`, `Fecha`) VALUES
('1', '2', '0000-00-00'),
('1', '5', '0000-00-00'),
('1', '6', '0000-00-00'),
('2', '2', '0000-00-00'),
('2', '5', '0000-00-00'),
('2', '6', '0000-00-00'),
('2', '7', '0000-00-00'),
('3', '5', '0000-00-00'),
('3', '6', '0000-00-00'),
('4', '2', '0000-00-00'),
('4', '3', '0000-00-00'),
('4', '5', '0000-00-00'),
('4', '6', '0000-00-00'),
('4', '7', '0000-00-00'),
('7', '5', '0000-00-00'),
('9', '5', '0000-00-00');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `email`, `password`, `Nombre`, `Apellidos`, `Localizacion`, `Experiencia`, `Pasiones`, `CartaPresentacion`, `Img_Perfil`, `Oficio`, `Curriculum`) VALUES
('2', 'pepeg@gmail.com', '51d84c1132217bc2f94f646d6f84c18545f451c4', 'Pepe', 'García Ruin', 'Albacete', 'Llevo casi 20 años en el ámbito laboral de la informática y más centrado en el lenguaje PHP. He trabajado para grandes multinacionales y ahora busco una startup donde conozca directamente a mis jefes y haya un ámbito laboral más cercano y no tan frío.', 'Mis pasiones son sencillas pero necesarias para mí. \r\nSoy un hombre calmado que le gusta leer con un buen café, en el metro me gusta investigar noticias nuevas sobre mi campo de trabajo para estar siempre actualizado ya que creo que es muy importante.\r\nLo que más me gusta de todo es pasar tiempo con mis familiares y amigos.', 'Hola me llamo Pepe, tengo 43  años y soy experto en  programación PHP, graduado en ingeniaría infomática, especializado en bases de datos. \r\nVivo en Getafe centro y dispongo de coche propio para cualquier desplazamiento dentro de Madrid.\r\nSoy una persona muy sociable capaz de trabajar con cualquier tipo de persona eficazmente.', 'img/imgU2.jpg', 'Programador', ''),
('3', 'helenap@gmail.com', '6f6b0db803758bcafba10900d4269ccceebc9eaa', 'Helena', 'Pómez', 'Valencia', 'Mi experiencia se basa en haber estudiado diseño de producto en la EASD Valencia. He producido decenas de diseños para diferentes compañías y proyectos que se pueden ver en mi portfolio helenapomez.es , tengo ganas de añadir a este camino desde el mundo del emprendimiento.', 'Si tuviese que escoger mis principales pasiones tendrían que ser dibujar comics, bailar y reír con mis amigos y familia. Cada día leo lo que pueda y pienso que es la mejor manera de aprender de forma rápido junto a la práctica. Me encanta ser sociable y conocer a gente maravillosa.', 'Buenas me llamo Helena y tengo 26 años. Toda mi vida me he dedicado a diseñar, desde varias perspectivas, más concretamente ropa, comics y los últimos 5 años aplicaciones y páginas web. Llevo tiempo queriendo experimentar con lo que significa llevar una startup adelante.', 'img/helenap.jpg', 'UX Designer', ''),
('4', 'tomask@gmail.com', '2a2ced81987b9344dcd56dd19877b7cbe6ff34b2', 'Tomás', 'Ko', 'Bilbao', 'Mi experiencia ha sido el grado en Economía en la universidad de Utah, además de 6 años de contable para 3 empresas multinacionales. Pero creo que la experiencia que más vale es la que he adquirido en el sector del turismo por todo mi movimiento.', 'Mi pasión principal es, cómo puedes adivinar, viajar. Me encanta todos los aspectos de ello desde los cambios culturales en las grandes ciudades hasta perderme por los bosques de cada país que visito.', 'Hola soy Tomás, tengo 31 y llevo toda mi vida moviendome por el mundo, he vivido en 5 continentes y estos últimos 2 años estoy muy contento en España. Me gustaría encontrar una empresa de viajes o turismo para aplicar mis experiencias junto a la economía.', 'img/tomask.jpg', 'Contable', ''),
('5', 'laurac@gmail.com', 'a43782cbc6ef9032aa29ddf6e29bf46f3712a6f1', 'Laura', 'Canales', 'La Coruña', 'Trabaje 8 años de profesora de conducir de motos, y estos últimos 10 de profesora de Movilidad y Urbanismo en la Universidad de A Coruña. Tengo ganas de perseguir lo que de verdad importa y pasar al siguiente nivel en mi vida.', 'Mi pasión es el motociclismo y utilizarlo para viajar por todo tipo de lugares, desde las más altas montañas a temperaturas negativas, hasta calas calurosas y con curvas vertiginosas. Quiero aprovechar mi pasión y trabajar en alguna empresa que relacione el motociclismo con los viajes, ¡o si no la crearé yo misma!', '¡Hola StartOn! Soy Laura, tengo 41 años y quiero dejar mi puesto de profesora en la universidad para perseguir mi obsesión con el motociclismo y los viajes.', 'img/laurac.jpg', 'Profesora', ''),
('6', 'danpina@ucm.es', 'c7a2851fd2f7da303050a63d00a8135322d81147', 'Daniel', 'Piña', 'Madrid', 'Tengo experiencia en proyectos personales así como de la universidad.\r\nLlevo casi 3 años inmerso en el mundo del emprendimiento y las startups y con ganas de cada vez más aprender más sobre ello.', 'Me apasionan pocas cosas pero que de verdad me importan.\r\nMe apasiona mirar a los ojos y rodearme de gente con tenga sus propias pasiones que le causen un brillo en los ojos.\r\nTambién me apasiona investigar sobre creación de hábitos, minimalismo, y con ello centrarse en lo que de verdad le importa a uno mismo en la vida.', 'Hola soy Daniel, tengo 20 años y vivo en Madrid pero nacido y con mi corazón en La Coruña. Estudio Ingeniería Informática.\r\nLLevo ya un tiempo muy interesado en el emprendimiento, en como se comportan las personas, y cómo ser feliz de verdad y encontrar tu camino centrandote en lo que de verdad importa día a día.', 'img/imgU6.jpg', 'Estudiante', ''),
('7', 'pablof@gmail.com', '29dee7f2d5e6a95ef8dda502e2270d7658460345', 'Pablo', 'Fernandez Jara', 'Villaverde', 'Trabajo en una empresa controlando contenido en Wordpress. Estoy buscando un trabajo más ampliado.', 'Balonmano, atletismo. Tocar las narices a Daniel Piña.\r\nAdemás disfrutar de las tardes soleadas.', 'Soy alumno de la complutense, de ingenieria informatica. Me gusta programar y las tardes soleadas.\r\nEstoy aquí para buscar trabajo y si puedo el amor.', 'img/imgU7.jpg', 'Jesucristo', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
