# Interview Web Services

This library covers code for the exercise required for the interview to get an idea of my code style and skills.

## Requirements

- Create the API using the Slim framework (PHP 7.4 or greater)
- API should have a couple endpoints for fetching some dummy data (doesn't matter what)
- Endpoints handled by controller classes.
- Create a repository interface and concrete class to use for fetching applicable data for endpoint(s). You don't need to use a DB connection they can simply use static data from an array. The return type from repository method(s) should a domain model for the entity you are returning. Include some logic in the repository class so that you can fetch different data based on criteria. For example if you have a method defined like getFooById(int $id) have a few data elements in there that would allow a user to pass a valid id and get back the appropriate data.
- To secure the endpoint(s) assume there is a secret key passed in each request that gets verified, otherwise the user can not access the endpoint(s). You can create a static hash (and store it somewhere in the code for this). There should be a class that's responsible for taking the requestor's token and verifying that it is valid.
- Set up/import a DI container in Slim to inject dependencies into the Controller(s)

## Deployment instructions

- Checkout the code from the repository
- Run `composer install`
- Run it locally by going into the `app` directory and the run `php -S localhost:8888`. You can use any port.

## Endpoints

The exercise provides 3 endpoints.

For simplicity all endpoints use the HTTP `GET` method since they are all fetching data.

All endpoints return a JSON string.
- `/status` Unauthenticated endpoint. Returns a string with the status.
- `pet/{id}` Authenticated endpoint. Returns pet data corresponding to the given id.
- `pet/name/{name}` Authenticated endpoint. Returns pet data corresponding to the given name.

### Authenticated endpoints

For authenticated endpoints you need to provide a `Bearer` token with value corresponding to that hardcoded in the `InterviewExercise\Middleware\Validators\TokenValidator` class.

Actual value is: `e73bb59be2dca745dd023700ebe12fc4664bb48eb21957ff6edc86bda6879913e7185bea5d9fd20eb7ef6fe8dcc5d899`

So really the request needs to include a header called `Authorization` with the following value:

`Bearer e73bb59be2dca745dd023700ebe12fc4664bb48eb21957ff6edc86bda6879913e7185bea5d9fd20eb7ef6fe8dcc5d899`.

### Dummy data

Dummy data is hardcoded inside the `InterviewExercise\Pet\Repositories\PetRepository` class.

Actual dummy data:

```json
{
  [
    "id" => 1,
    "name" => "Plopper",
    "species" => "Pig",
    "gender" => "male",
  ],
  [
    "id" => 2,
    "name" => "Snowball",
    "species" => "Cat",
    "gender" => "Female",
  ],
  [
    "id" => 3,
    "name" => "Pinchy",
    "species" => "Lobster",
    "gender" => "Male",
  ]
}
```