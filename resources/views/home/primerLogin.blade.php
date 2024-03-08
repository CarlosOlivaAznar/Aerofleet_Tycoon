@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main  class="mainContent">
    
    <form action="">
        <div class="formulario">
            <h1>Introduce los datos de tu nueva compañia aérea</h1>

            <div class="campos">
                <label for="nombreCompanyia">Nombre de la compañia aérea:</label>
                <input type="text" name="nombreCompanyia" id="nombreCompanyia">
            </div>

            <div class="campos">
                <label for="sede">Localizacion de la sede</label>
                <select name="localizacion" id="localizacion">
                    <option value="a">El Prat</option>
                    <option value="b">Madrid Adolfo Suarez Barajas</option>
                </select>
            </div>
        </div>
    </form>
  </main>
</body>
</html>
@endauth()