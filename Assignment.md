La empresa ficticia **Booky S.A.** necesita un sistema para gestionar su **catálogo
de libros y autores**. El objetivo es modelar y estructurar la lógica del backend
de la aplicación, organizando el código según la **división en capas** que vimos
en clase.
No es necesario implementar la interfaz web (frontend), de hecho queda por
fuera de los alcances de este parcial, pero sí es importante definir claramente los
aspectos del backend.

# Requerimientos

**1. Modelos**
Deberán definirse al menos los siguientes modelos básicos:
✅ **Model (Abstracto)**
    ● Atributos comunes:
       ○ id (identificador único, entero)
       ○ createdAt (fecha de creación)
       ○ updatedAt (fecha de última modificación)
    ● Métodos: getters y setters generales.
    ● Este modelo será extendido por las clases concretas.
✅ **Libro**
    ● Atributos específicos:
       ○ titulo (string, obligatorio, máximo 255 caracteres)
       ○ isbn (string, único, 13 caracteres)
       ○ anioPublicacion (año, opcional)
       ○ autorId (relación con Autor)
✅ **Autor**
    ● Atributos específicos:
       ○ nombre (string, obligatorio)
       ○ nacionalidad (string, opcional)


**2. DAO e Interfaces**
    ● Definir una **interfaz general DAOInterface** con operaciones CRUD
       estándar (create, read, update, delete, findAll, findById).
    ● Implementar un **BaseDAO (abstracto)** que contenga la lógica común
       para ambas implementaciones concretas.
    ● Crear dos implementaciones de DAO:
       ○ FileDAO: acceso a datos mediante archivos planos (por ejemplo,
          JSON o CSV).
       ○ PDODAO: acceso a datos usando **PDO** para conectarse a una base
          de datos relacional (por ejemplo, MySQL o SQLite).
    ● Los DAOs deben ser genéricos para que se puedan usar con cualquier
       modelo.
**3. Validaciones**
    ● Crear **clases de validación separadas** (por ejemplo, LibroValidator,
       AutorValidator) con métodos que validen las reglas de negocio, como:
          ○ Campos obligatorios.
          ○ Unicidad del ISBN.
          ○ Formato de los datos.
    ● Las validaciones deben aplicarse antes de guardar o actualizar registros en
       el DAO.
**4. Estructura de Capas**
El código debe estar organizado en las siguientes capas:
    ● Aquella que maneje las solicitudes (puede ser simulado con métodos).
    ● Aquella que aplique lógica de negocio y delegar en el DAO.
    ● Aquella que maneje la persistencia según la implementación (File o PDO).
    ● Modelo para representar los objetos de dominio.
    ● Otras que consideren
**5. Seguridad, código Limpio y Reutilización**
    ● Evitar la repetición de código mediante la utilización de herencia e
       interfaces.
    ● El **BaseDAO** y la **clase Model abstracta** deben ser aprovechados por
       todos los modelos y DAOs específicos.
    ● Incluir una **estructura de carpetas clara** para organizar cada capa y
       componente.


```
● Debemos tener un mecanismo de trackear de forma detallada los errores
que sucedan en el sistema.
```
## Entrega

El TP deberá incluir:
● Código completo, bien documentado.
● Diagrama simple (puede ser a mano o digital) que muestre la estructura
de las capas y la relación entre componentes.

## Consideraciones

```
● Separar validación , persistencia, modelo y lógica de negocio en
capas distintas.
● Definir la interfaz DAO antes de las implementaciones concretas.
● Utilicen herencia y abstracciones para minimizar duplicación.
● El sistema puede funcionar con una simulación simple en consola para
probar la funcionalidad (0 no)
● Definir las interfaces de las abstracciones principales para garantizar la
operabilidad
● Definir una jerarquía de excepciones personalizadas dado el dominio o
problema
● Evitar la repetición de código mediante la reutilización y abstracción
(definiendo funciones generales o bien clases encargadas de reutilizar
comportamiento definido de la forma más general posible)
● Agregar try/catch de tal forma que no quede fragmentos de código
sensible que pueda propagar un error que no podamos manejar o que no
personalicemos si tratamiento.
```

