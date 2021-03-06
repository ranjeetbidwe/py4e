<?php if ( file_exists("../booktop.php") ) {
  require_once "../booktop.php";
  ob_start();
}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
  <meta charset="utf-8" />
  <meta name="generator" content="pandoc" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title>-</title>
  <style>
    code{white-space: pre-wrap;}
    span.smallcaps{font-variant: small-caps;}
    span.underline{text-decoration: underline;}
    div.column{display: inline-block; vertical-align: top; width: 50%;}
    div.hanging-indent{margin-left: 1.5em; text-indent: -1.5em;}
    ul.task-list{list-style: none;}
  </style>
  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
</head>
<body>
<h1 id="tuplas">Tuplas</h1>
<h2 id="las-tuplas-son-inmutables">Las Tuplas son inmutables</h2>
<p>  </p>
<p>Una tupla<a href="#fn1" class="footnote-ref" id="fnref1" role="doc-noteref"><sup>1</sup></a> es una secuencia de valores similar a una lista. Los valores guardados en una tupla pueden ser de cualquier tipo, y son indexados por números enteros. La principal diferencia es que las tuplas son <em>inmutables</em>. Las tuplas además son <em>comparables</em> y <em>dispersables</em> (hashables) de modo que las listas de tuplas se pueden ordenar y también usar tuplas como valores para las claves en diccionarios de Python.</p>
<p>   </p>
<p>Sintácticamente, una tupla es una lista de valores separados por comas:</p>
<pre class="python"><code>&gt;&gt;&gt; t = &#39;a&#39;, &#39;b&#39;, &#39;c&#39;, &#39;d&#39;, &#39;e&#39;</code></pre>
<p>Aunque no es necesario, es común encerrar las tuplas entre paréntesis para ayudarnos a identificarlas rápidamente cuando revisemos código de Python:</p>
<p></p>
<pre class="python"><code>&gt;&gt;&gt; t = (&#39;a&#39;, &#39;b&#39;, &#39;c&#39;, &#39;d&#39;, &#39;e&#39;)</code></pre>
<p>Para crear una tupla con un solo elemento, es necesario incluir una coma al final:</p>
<p> </p>
<pre class="python trinket"><code>&gt;&gt;&gt; t1 = (&#39;a&#39;,)
&gt;&gt;&gt; type(t1)
&lt;type &#39;tuple&#39;&gt;</code></pre>
<p>Sin la coma, Python considera <code>('a')</code> como una expresión con una cadena entre paréntesis que es evaluada como de tipo cadena (string):</p>
<pre class="python"><code>&gt;&gt;&gt; t2 = (&#39;a&#39;)
&gt;&gt;&gt; type(t2)
&lt;type &#39;str&#39;&gt;</code></pre>
<p>Otra forma de construir una tupla es utilizando la función interna <code>tuple</code>. Sin argumentos, ésta crea una tupla vacía:</p>
<p> </p>
<pre class="python trinket"><code>&gt;&gt;&gt; t = tuple()
&gt;&gt;&gt; print(t)
()</code></pre>
<p>Si el argumento es una secuencia (cadena, lista, o tupla), el resultado de la llamada a <code>tuple</code> es una tupla con los elementos de la secuencia:</p>
<pre class="python trinket"><code>&gt;&gt;&gt; t = tuple(&#39;altramuces&#39;)
&gt;&gt;&gt; print(t)
(&#39;a&#39;, &#39;l&#39;, &#39;t&#39;, &#39;r&#39;, &#39;a&#39;, &#39;m&#39;, &#39;u&#39;, &#39;c&#39;, &#39;e&#39;, &#39;s&#39;)</code></pre>
<p>Dado que <code>tuple</code> es el nombre de un constructor, debería evitarse su uso como nombre de variable.</p>
<p>La mayoría de los operadores de listas también funcionan en tuplas. El operador corchete indexa un elemento:</p>
<p> </p>
<pre class="python trinket"><code>&gt;&gt;&gt; t = (&#39;a&#39;, &#39;b&#39;, &#39;c&#39;, &#39;d&#39;, &#39;e&#39;)
&gt;&gt;&gt; print(t[0])
&#39;a&#39;</code></pre>
<p>Y el operador de rebanado (slice) selecciona un rango de elementos.</p>
<p>   </p>
<pre class="python"><code>&gt;&gt;&gt; print(t[1:3])
(&#39;b&#39;, &#39;c&#39;)</code></pre>
<p>Pero si se intenta modificar uno de los elementos de la tupla, se produce un error:</p>
<p>   </p>
<pre class="python"><code>&gt;&gt;&gt; t[0] = &#39;A&#39;
TypeError: object doesn&#39;t support item assignment</code></pre>
<p>No se puede modificar los elementos de una tupla, pero sí se puede reemplazar una tupla por otra:</p>
<pre class="python trinket"><code>&gt;&gt;&gt; t = (&#39;A&#39;,) + t[1:]
&gt;&gt;&gt; print(t)
(&#39;A&#39;, &#39;b&#39;, &#39;c&#39;, &#39;d&#39;, &#39;e&#39;)</code></pre>
<h2 id="comparación-de-tuplas">Comparación de tuplas</h2>
<p>   </p>
<p>Los operadores de comparación funcionan con tuplas y otras secuencias. Python comienza comparando el primer elemento de cada secuencia. Si ambos elementos son iguales, pasa al siguiente elemento y así sucesivamente, hasta que encuentra elementos diferentes. Los elementos subsecuentes no son considerados (aunque sean muy grandes).</p>
<pre class="python trinket"><code>&gt;&gt;&gt; (0, 1, 2) &lt; (0, 3, 4)
True
&gt;&gt;&gt; (0, 1, 2000000) &lt; (0, 3, 4)
True</code></pre>
<p>La función <code>sort</code> funciona de la misma manera. Ordena inicialmente por el primer elemento, pero en el caso de que ambos elementos sean iguales, ordena por el segundo elemento, y así sucesivamente.</p>
<p>Esta característica se presta a un patrón de diseño llamado <em>DSU</em>, que</p>
<dl>
<dt>Decorate (Decora)</dt>
<dd>una secuencia, construyendo una lista de tuplas con uno o más índices ordenados precediendo los elementos de la secuencia,
</dd>
<dt>Sort (Ordena)</dt>
<dd>la lista de tuplas utilizando la función interna <code>sort</code>, y
</dd>
<dt>Undecorate (Quita la decoración)</dt>
<dd>extrayendo los elementos ordenados de la secuencia.
</dd>
</dl>
<p>    </p>
<p>Por ejemplo, suponiendo una lista de palabras que se quieren ordenar de la más larga a la más corta:</p>
<pre class="python"><code>txt = &#39;Pero qué luz se deja ver allí&#39;
palabras = txt.split()
t = list()
for palabra in palabras:
    t.append((len(palabra), palabra))

t.sort(reverse=True)

res = list()
for longitud, palabra in t:
    res.append(palabra)

print(res)

# Código: https://es.py4e.com/code3/soft.py</code></pre>
<p>El primer bucle genera una lista de tuplas, donde cada tupla es una palabra precedida por su longitud.</p>
<p><code>sort</code> compara el primer elemento (longitud) primero, y solamente considera el segundo elemento para desempatar. El argumento clave <code>reverse=True</code> indica a <code>sort</code> que debe ir en orden decreciente.</p>
<p>  </p>
<p>El segundo bucle recorre la lista de tuplas y construye una lista de palabras en orden descendente según la longitud. Las palabras de cuatro letras están ordenadas en orden alfabético <em>inverso</em>, así que “deja” aparece antes que “allí” en la siguiente lista.</p>
<p>La salida del programa es la siguiente:</p>
<pre><code>[&#39;deja&#39;, &#39;allí&#39;, &#39;Pero&#39;, &#39;ver&#39;, &#39;qué&#39;, &#39;luz&#39;, &#39;se&#39;]</code></pre>
<p>Por supuesto, la línea pierde mucho de su impacto poético cuando se convierte en una lista de Python y se almacena en orden descendente según la longitud de las palabras.</p>
<h2 id="asignación-de-tuplas">Asignación de tuplas</h2>
<p>   </p>
<p>Una de las características sintácticas únicas del lenguaje Python es la capacidad de tener una tupla en el lado izquierdo de una sentencia de asignación. Esto permite asignar más de una variable a la vez cuando hay una secuencia del lado izquierdo.</p>
<p>En este ejemplo tenemos una lista de dos elementos (la cual es una secuencia) y asignamos el primer y segundo elementos de la secuencia a las variables <code>x</code> y <code>y</code> en una única sentencia.</p>
<pre class="python trinket"><code>&gt;&gt;&gt; m = [ &#39;pásalo&#39;, &#39;bien&#39; ]
&gt;&gt;&gt; x, y = m
&gt;&gt;&gt; x
&#39;pásalo&#39;
&gt;&gt;&gt; y
&#39;bien&#39;
&gt;&gt;&gt;</code></pre>
<p>No es magia, Python traduce <em>aproximadamente</em> la sintaxis de asignación de la tupla de este modo::<a href="#fn2" class="footnote-ref" id="fnref2" role="doc-noteref"><sup>2</sup></a></p>
<pre class="python trinket"><code>&gt;&gt;&gt; m = [ &#39;pásalo&#39;, &#39;bien&#39; ]
&gt;&gt;&gt; x = m[0]
&gt;&gt;&gt; y = m[1]
&gt;&gt;&gt; x
&#39;pásalo&#39;
&gt;&gt;&gt; y
&#39;bien&#39;
&gt;&gt;&gt;</code></pre>
<p>Estilísticamente, cuando se utiliza una tupla en el lado izquierdo de la asignación, se omiten los paréntesis, pero lo que se muestra a continuación es una sintaxis igualmente válida:</p>
<pre class="python"><code>&gt;&gt;&gt; m = [ &#39;pásalo&#39;, &#39;bien&#39; ]
&gt;&gt;&gt; (x, y) = m
&gt;&gt;&gt; x
&#39;pásalo&#39;
&gt;&gt;&gt; y
&#39;bien&#39;
&gt;&gt;&gt;</code></pre>
<p>Una aplicación particularmente ingeniosa de asignación con tuplas permite <em>intercambiar</em> los valores de dos variables en una sola sentencia:</p>
<pre class="python"><code>&gt;&gt;&gt; a, b = b, a</code></pre>
<p>Ambos lados de la sentencia son tuplas, pero el lado izquierdo es una tupla de variables; el lado derecho es una tupla de expresiones. Cada valor en el lado derecho es asignado a su respectiva variable en el lado izquierdo. Todas las expresiones en el lado derecho son evaluadas antes de realizar cualquier asignación.</p>
<p>El número de variables en el lado izquierdo y el número de valores en el lado derecho deben ser iguales:</p>
<p> </p>
<pre class="python"><code>&gt;&gt;&gt; a, b = 1, 2, 3
ValueError: too many values to unpack</code></pre>
<p>Generalizando más, el lado derecho puede ser cualquier tipo de secuencia (cadena, lista, o tupla). Por ejemplo, para dividir una dirección de e-mail en nombre de usuario y dominio, se podría escribir:</p>
<p>  </p>
<pre class="python"><code>&gt;&gt;&gt; dir = &#39;monty@python.org&#39;
&gt;&gt;&gt; nombreus, dominio = dir.split(&#39;@&#39;)</code></pre>
<p>El valor de retorno de <code>split</code> es una lista con dos elementos; el primer elemento es asignado a <code>nombreus</code>, el segundo a <code>dominio</code>.</p>
<pre class="python"><code>&gt;&gt;&gt; print(nombreus)
monty
&gt;&gt;&gt; print(dominio)
python.org</code></pre>
<h2 id="diccionarios-y-tuplas">Diccionarios y tuplas</h2>
<p>   </p>
<p>Los diccionarios tienen un método llamado <code>items</code> que retorna una lista de tuplas, donde cada tupla es un par clave-valor:</p>
<pre class="python trinket"><code>&gt;&gt;&gt; d = {&#39;a&#39;:10, &#39;b&#39;:1, &#39;c&#39;:22}
&gt;&gt;&gt; t = list(d.items())
&gt;&gt;&gt; print(t)
[(&#39;b&#39;, 1), (&#39;a&#39;, 10), (&#39;c&#39;, 22)]</code></pre>
<p>Como sería de esperar en un diccionario, los elementos no tienen ningún orden en particular.</p>
<p>Aun así, puesto que la lista de tuplas es una lista, y las tuplas son comparables, ahora se puede ordenar la lista de tuplas. Convertir un diccionario en una lista de tuplas es una forma de obtener el contenido de un diccionario ordenado según sus claves:</p>
<pre class="python"><code>&gt;&gt;&gt; d = {&#39;a&#39;:10, &#39;b&#39;:1, &#39;c&#39;:22}
&gt;&gt;&gt; t = list(d.items())
&gt;&gt;&gt; t
[(&#39;b&#39;, 1), (&#39;a&#39;, 10), (&#39;c&#39;, 22)]
&gt;&gt;&gt; t.sort()
&gt;&gt;&gt; t
[(&#39;a&#39;, 10), (&#39;b&#39;, 1), (&#39;c&#39;, 22)]</code></pre>
<p>La nueva lista está ordenada en orden alfabético ascendente de acuerdo al valor de sus claves.</p>
<h2 id="asignación-múltiple-con-diccionarios">Asignación múltiple con diccionarios</h2>
<p> </p>
<p>La combinación de <code>items</code>, asignación de tuplas, y <code>for</code>, produce un buen patrón de diseño de código para recorrer las claves y valores de un diccionario en un único bucle:</p>
<pre class="python"><code>for clave, valor in list(d.items()):
    print(valor, clave)</code></pre>
<p>Este bucle tiene dos <em>variables de iteración</em>, debido a que <code>items</code> retorna una lista de tuplas y <code>clave, valor</code> es una asignación en tupla que itera sucesivamente a través de cada uno de los pares clave-valor del diccionario.</p>
<p>Para cada iteración a través del bucle, tanto <code>clave</code> y <code>valor</code> van pasando al siguiente par clave-valor del diccionario (todavía en orden de dispersión).</p>
<p>La salida de este bucle es:</p>
<pre><code>10 a
1 b
22 c</code></pre>
<p>De nuevo, las claves están en orden de dispersión (es decir, ningún orden en particular).</p>
<p>Si se combinan esas dos técnicas, se puede imprimir el contenido de un diccionario ordenado por el <em>valor</em> almacenado en cada par clave-valor.</p>
<p>Para hacer esto, primero se crea una lista de tuplas donde cada tupla es <code>(valor, clave)</code>. El método <code>items</code> dará una lista de tuplas <code>(clave, valor)</code>, pero esta vez se pretende ordenar por valor, no por clave. Una vez que se ha construido la lista con las tuplas clave-valor, es sencillo ordenar la lista en orden inverso e imprimir la nueva lista ordenada.</p>
<pre class="python"><code>&gt;&gt;&gt; d = {&#39;a&#39;:10, &#39;b&#39;:1, &#39;c&#39;:22}
&gt;&gt;&gt; l = list()
&gt;&gt;&gt; for clave, valor in d.items() :
...     l.append( (valor, clave) )
...
&gt;&gt;&gt; l
[(10, &#39;a&#39;), (1, &#39;b&#39;), (22, &#39;c&#39;)]
&gt;&gt;&gt; l.sort(reverse=True)
&gt;&gt;&gt; l
[(22, &#39;c&#39;), (10, &#39;a&#39;), (1, &#39;b&#39;)]
&gt;&gt;&gt;</code></pre>
<p>Al construir cuidadosamente la lista de tuplas para tener el valor como el primer elemento de cada tupla, es posible ordenar la lista de tuplas y obtener el contenido de un diccionario ordenado por valor.</p>
<h2 id="las-palabras-más-comunes">Las palabras más comunes</h2>
<p></p>
<p>Volviendo al ejemplo anterior del texto de <em>Romeo y Julieta</em>, Acto 2, Escena 2, podemos mejorar nuestro programa para hacer uso de esta técnica para imprimir las diez palabras más comunes en el texto, como se ve a continuación:</p>
<pre class="python"><code>import string
manejador = open(&#39;romeo-full.txt&#39;)
contadores = dict()
for linea in manejador:
    linea = linea.translate(str.maketrans(&#39;&#39;, &#39;&#39;, string.punctuation))
    linea = linea.lower()
    palabras = linea.split()
    for palabra in palabras:
        if palabra not in contadores:
            contadores[palabra] = 1
        else:
            contadores[palabra] += 1

# Ordenar el diccionario por valor
lst = list()
for clave, valor in list(contadores.items()):
    lst.append((valor, clave))

lst.sort(reverse=True)

for clave, valor in lst[:10]:
    print(clave, valor)

# Código: https://es.py4e.com/code3/count3.py</code></pre>
<p>La primera parte del programa, la cual lee un archivo y construye un diccionario que mapea cada palabra con la cantidad de veces que se repite esa palabra en el documento, no ha cambiado. Pero en lugar de imprimir simplemente <code>contadores</code> y terminar el programa, ahora construimos una lista de tuplas <code>(val, key)</code> y luego se ordena la lista en orden inverso.</p>
<p>Puesto que el valor está primero, será utilizado para las comparaciones. Si hay más de una tupla con el mismo valor, se tendrá en cuenta el segundo elemento (la clave), de forma que las tuplas cuyo valor es el mismo serán también ordenadas en orden alfabético según su clave.</p>
<p>Al final escribimos un elegante bucle <code>for</code> que hace una iteración con asignación múltiple e imprime las diez palabras más comunes, iterando a través de una parte de la lista (<code>lst[:10]</code>).</p>
<p>Ahora la salida finalmente tiene el aspecto que queríamos para nuestro análisis de frecuencia de palabras.</p>
<pre><code>61 i
42 and
40 romeo
34 to
34 the
32 thou
32 juliet
30 that
29 my
24 thee</code></pre>
<p>El hecho de que este complejo análisis y procesado de datos pueda ser realizado con un programa de Python de 19 líneas fácil de entender, es una razón de por qué Python es una buena elección como lenguaje para explorar información.</p>
<h2 id="uso-de-tuplas-como-claves-en-diccionarios">Uso de tuplas como claves en diccionarios</h2>
<p> </p>
<p>Dado que las tuplas son <strong>dispersables</strong> <em>(hashable)</em> y las listas no, si se quiere crear una clave <strong>compuesta</strong> para usar en un diccionario, se debe utilizar una tupla como clave.</p>
<p>Usaríamos por ejemplo una clave compuesta si quisiéramos crear un directorio telefónico que mapea pares appellido, nombre con números telefónicos. Asumiendo que hemos definido las variables <code>apellido</code>, <code>nombre</code>, y <code>número</code>, podríamos escribir una sentencia de asignación de diccionario como sigue:</p>
<pre class="python"><code>directorio[apellido,nombre] = numero</code></pre>
<p>La expresión entre corchetes es una tupla. Podríamos utilizar asignación de tuplas en un bucle <code>for</code> para recorrer este diccionario.</p>
<p></p>
<pre class="python"><code>for apellido, nombre in directorio:
    print(nombre, apellido, directorio[apellido,nombre])</code></pre>
<p>Este bucle recorre las claves en <code>directorio</code>, las cuales son tuplas. Asigna los elementos de cada tupla a <code>apellido</code> y <code>nombre</code>, después imprime el nombre y el número telefónico correspondiente.</p>
<h2 id="secuencias-cadenas-listas-y-tuplas---dios-mío">Secuencias: cadenas, listas, y tuplas - ¡Dios mío!</h2>
<p></p>
<p>Me he enfocado en listas de tuplas, pero casi todos los ejemplos de este capítulo funcionan también con listas de listas, tuplas de tuplas, y tuplas de listas. Para evitar enumerar todas las combinaciones posibles, a veces es más sencillo hablar de secuencias de secuencias.</p>
<p>En muchos contextos, los diferentes tipos de secuencias (cadenas, listas, y tuplas) pueden intercambiarse. Así que, ¿cómo y por qué elegir uno u otro?</p>
<p>    </p>
<p>Para comenzar con lo más obvio, las cadenas están más limitadas que otras secuencias, debido a que los elementos tienen que ser caracteres. Además, son inmutables. Si necesitas la capacidad de cambiar los caracteres en una cadena (en vez de crear una nueva), quizá prefieras utilizar una lista de caracteres.</p>
<p>Las listas son más comunes que las tuplas, principalmente porque son mutables. Pero hay algunos casos donde es preferible utilizar tuplas:</p>
<ol type="1">
<li><p>En algunos contextos, como una sentencia return, resulta sintácticamente más simple crear una tupla que una lista. En otros contextos, es posible que prefieras una lista.</p></li>
<li><p>Si quieres utilizar una secuencia como una clave en un diccionario, debes usar un tipo inmutable como una tupla o una cadena.</p></li>
<li><p>Si estás pasando una secuencia como argumento de una función, el uso de tuplas reduce la posibilidad de comportamientos inesperados debido a la creación de alias.</p></li>
</ol>
<p>Dado que las tuplas son inmutables, no proporcionan métodos como <code>sort</code> y <code>reverse</code>, que modifican listas ya existentes. Sin embargo, Python proporciona las funciones internas <code>sorted</code> y <code>reversed</code>, que toman una secuencia como parámetro y devuelven una secuencia nueva con los mismos elementos en un orden diferente.</p>
<p>   </p>
<h2 id="depuración">Depuración</h2>
<p>   </p>
<p>Las listas, diccionarios y tuplas son conocidas de forma genérica como <em>estructuras de datos</em>; en este capítulo estamos comenzando a ver estructuras de datos compuestas, como listas de tuplas, y diccionarios que contienen tuplas como claves y listas como valores. Las estructuras de datos compuestas son útiles, pero también son propensas a lo que yo llamo <em>errores de modelado</em>; es decir, errores causados cuando una estructura de datos tiene el tipo, tamaño o composición incorrecto, o quizás al escribir una parte del código se nos olvidó cómo era el modelado de los datos y se introdujo un error. Por ejemplo, si estás esperando una lista con un entero y recibes un entero solamente (no en una lista), no funcionará.</p>
<h2 id="glosario">Glosario</h2>
<dl>
<dt>comparable</dt>
<dd>Un tipo en el cual un valor puede ser revisado para ver si es mayor que, menor que, o igual a otro valor del mismo tipo. Los tipos que son comparables pueden ser puestos en una lista y ordenados.
</dd>
<dt>estructura de datos</dt>
<dd>Una collección de valores relacionados, normalmente organizados en listas, diccionarios, tuplas, etc.
</dd>
<dt>DSU</dt>
<dd>Abreviatura de “decorate-sort-undecorate (decorar-ordenar-quitar la decoración)”, un patrón de diseño que implica construir una lista de tuplas, ordenarlas, y extraer parte del resultado.
</dd>
<dt>reunir</dt>
<dd>La operación de tratar una secuencia como una lista de argumentos.
</dd>
<dt>hashable (dispersable)</dt>
<dd>Un tipo que tiene una función de dispersión. Los tipos inmutables, como enteros, flotantes y cadenas son dispersables (hashables); los tipos mutables como listas y diccionarios no lo son.
</dd>
<dt>dispersar</dt>
<dd>La operación de tratar una secuencia como una lista de argumentos.
</dd>
<dt>modelado (de una estructura de datos)</dt>
<dd>Un resumen del tipo, tamaño, y composición de una estructura de datos.
</dd>
<dt>singleton</dt>
<dd>Una lista (u otra secuencia) con un único elemento.
</dd>
<dt>tupla</dt>
<dd>Una secuencia inmutable de elementos.
</dd>
<dt>asignación por tuplas</dt>
<dd>Una asignación con una secuencia en el lado derecho y una tupla de variables en el izquierdo. El lado derecho es evaluado y luego sus elementos son asignados a las variables en el lado izquierdo.
</dd>
</dl>
<h2 id="ejercicios">Ejercicios</h2>
<p><strong>Ejercicio 1: Revisa el programa anterior de este modo: Lee y analiza las líneas “From” y extrae las direcciones de correo. Cuenta el número de mensajes de cada persona utilizando un diccionario.</strong></p>
<p><strong>Después de que todos los datos hayan sido leídos, imprime la persona con más envíos, creando una lista de tuplas (contador, email) del diccionario. Después ordena la lista en orden inverso e imprime la persona que tiene más envíos.</strong></p>
<pre><code>Línea de ejemplo:
From stephen.marquard@uct.ac.za Sat Jan  5 09:14:16 2008

Ingresa un nombre de archivo: mbox-short.txt
cwen@iupui.edu 5

Ingresa un nombre de archivo: mbox.txt
zqian@umich.edu 195</code></pre>
<p><strong>Ejercicio 2: Este programa cuenta la distribución de la hora del día para cada uno de los mensajes. Puedes extraer la hora de la línea “From” buscando la cadena horaria y luego dividiendo la cadena en partes utilizando el carácter colon. Una vez que hayas acumulado las cuentas para cada hora, imprime las cuentas, una por línea, ordenadas por hora tal como se muestra debajo.</strong></p>
<pre><code>python timeofday.py
Ingresa un nombre de archivo: mbox-short.txt
04 3
06 1
07 1
09 2
10 3
11 6
14 1
15 2
16 4
17 2
18 1
19 1</code></pre>
<p><strong>Ejercicio 3: Escribe un programa que lee un archivo e imprime las <em>letras</em> en order decreciente de frecuencia. El programa debe convertir todas las entradas a minúsculas y contar solamente las letras a-z. El programa no debe contar espacios, dígitos, signos de puntuación, o cualquier cosa que no sean las letras a-z. Encuentra ejemplos de texto en idiomas diferentes, y observa cómo la frecuencia de letras es diferente en cada idioma. Compara tus resultados con las tablas en <a href="https://es.wikipedia.org/wiki/Frecuencia_de_aparici%C3%B3n_de_letras" class="uri">https://es.wikipedia.org/wiki/Frecuencia_de_aparici%C3%B3n_de_letras</a>.</strong></p>
<p> </p>
<section class="footnotes" role="doc-endnotes">
<hr />
<ol>
<li id="fn1" role="doc-endnote"><p>Dato curioso: La palabra “tuple” proviene de los nombres dados a secuencias de números de distintas longitudes: simple, doble, triple, cuádruple, quíntuple, séxtuple, séptuple, etc.<a href="#fnref1" class="footnote-back" role="doc-backlink">↩︎</a></p></li>
<li id="fn2" role="doc-endnote"><p>Python no traduce la sintaxis literalmente. Por ejemplo, si se trata de hacer esto con un diccionario, no va a funcionar como se podría esperar.<a href="#fnref2" class="footnote-back" role="doc-backlink">↩︎</a></p></li>
</ol>
</section>
</body>
</html>
<?php if ( file_exists("../bookfoot.php") ) {
  $HTML_FILE = basename(__FILE__);
  $HTML = ob_get_contents();
  ob_end_clean();
  require_once "../bookfoot.php";
}?>
