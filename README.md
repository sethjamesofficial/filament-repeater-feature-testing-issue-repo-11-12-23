### Steps to reproduce:
1) Launch application server `./vendor/bin/sail up -d`
2) run migration and seeder: `./vendor/bin/sail migrate:fresh --seed`
3) Verify that interface works: visit localhost/admin, login with test@example.com and password, click `Example Models`, click the seeded record and ensure `test_item` and `another item` appear in repeater
4) run test (tests\Feature\ExampleModelTest) : `./vendor/bin/sail test`
5) see expected output:
```
   FAIL  Tests\Feature\ExampleModelTest
  ⨯ can edit resource                                                                                            0.52s
  ────────────────────────────────────────────────────────────────────────────────────────────────────────────────────
   FAILED  Tests\Feature\ExampleModelTest > can edit resource
  Failed asserting that null matches expected 'test_item'.

  at vendor/livewire/livewire/src/Features/SupportTesting/MakesAssertions.php:93
     89▕
     90▕         if (! is_string($value) && is_callable($value)) {
     91▕             PHPUnit::assertTrue($value($actual));
     92▕         } else {
  ➜  93▕             $strict ? PHPUnit::assertSame($value, $actual) : PHPUnit::assertEquals($value, $actual);
     94▕         }
     95▕
     96▕         return $this;
     97▕     }

      +4 vendor frames
  5   tests/Feature/ExampleModelTest.php:30


  Tests:    1 failed (4 assertions)
  Duration: 0.56s

```
