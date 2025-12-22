# 📝 Ejercicio Validación con Form Requests

## 📚 BookHaven API — Validación de entrada de datos

En la sesión anterior construiste los **controladores y rutas REST** de BookHaven para gestionar libros, reseñas y categorías.

En esta actividad vas a **mejorar la calidad de la API** añadiendo **validación de datos** mediante **Form Requests**, separando la lógica de validación de los controladores.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu API BookHaven deberá:

- Validar correctamente los datos al **crear y actualizar libros**.
- Validar los datos al **crear reseñas de un libro**.
- Evitar que lleguen a la base de datos:
  - Campos obligatorios vacíos.
  - Tipos de datos incorrectos.
  - Valores fuera del dominio esperado.
  - Relaciones con identificadores inexistentes.

La validación debe hacerse **exclusivamente mediante Form Requests**.

---

## 📐 Parte 1 — Form Requests para libros

Crea dos Form Requests para el modelo `Book`:

1. **Creación de libros**
2. **Actualización de libros**

### Requisitos de validación al crear un libro

El Form Request de creación debe validar que:

- El título es obligatorio y tiene una longitud razonable.
- El autor es obligatorio.
- El género es obligatorio.
- El número de páginas es obligatorio y numérico.
- El estado del libro solo puede tomar valores válidos del dominio (por ejemplo: available, reading, finished).
- El resumen es opcional.
- El usuario creador del libro existe si se proporciona.
- El usuario que está leyendo el libro existe si se proporciona.

---

### Requisitos de validación al actualizar un libro

El Form Request de actualización debe:

- Permitir actualizaciones parciales.
- Validar únicamente los campos que llegan en la petición.
- Aplicar las mismas reglas de dominio que en la creación cuando un campo está presente.
- No exigir campos que no se están actualizando.

---

## 📐 Parte 2 — Integración de los Form Requests en el controlador de libros

Modifica el controlador de libros para que:

- El método de creación utilice el Form Request de creación.
- El método de actualización utilice el Form Request de actualización.
- El controlador trabaje únicamente con los datos ya validados.

El controlador **no debe contener lógica de validación manual**.

---

## 📐 Parte 3 — Form Request para crear reseñas de un libro

Crea un Form Request para la creación de reseñas asociadas a un libro.

Debe validar que:

- El contenido de la reseña es obligatorio.
- La puntuación es obligatoria y numérica, dentro de un rango válido.
- El usuario autor de la reseña existe.
- El libro al que se asocia la reseña existe (vía la ruta).

---

## 📐 Parte 4 — Integración de la validación en reseñas

Modifica el controlador de reseñas para que:

- El método de creación reciba el Form Request correspondiente.
- Solo se creen reseñas si los datos cumplen todas las reglas.
- En caso de error, la API devuelva una respuesta de validación automática.

No es necesario añadir validación en la eliminación de reseñas.

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder mostrar o explicar:

1. **Form Requests**

   - Qué Form Requests has creado.
   - Para qué acción se usa cada uno.
   - Qué reglas principales de validación contiene cada uno.

2. **Libros**

   - Qué ocurre si intentas crear un libro con datos incompletos o inválidos.
   - Qué ocurre si intentas actualizar solo un campo.
   - Cómo se evita que se guarden datos incorrectos.

3. **Reseñas**

   - Qué ocurre si se intenta crear una reseña sin contenido o con puntuación inválida.
   - Cómo se valida la relación entre reseña, libro y usuario.

4. **Diseño**
   - Que los controladores quedan más simples que en la sesión anterior.
   - Que la validación está centralizada y no duplicada.
   - Que la API responde con errores claros cuando los datos no son válidos.
