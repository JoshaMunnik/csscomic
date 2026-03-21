<?php
declare(strict_types=1);

namespace App\Test\TestCase\Lib\Model\Base;

use App\Lib\Model\Base\ModelBase;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;
use DateTime;

/**
 * Tests for ModelBase::patch()
 */
class ModelBaseTest extends TestCase
{
  /**
   * Simple test model used for patch() testing.
   */
  public function testPatchValidDataAndDateTime(): void
  {
    $model = new class() extends ModelBase {
      public string $name = '';
      public int $age = 0;
      public ?DateTime $created = null;

      protected function buildValidator(): Validator
      {
        $v = new Validator();
        $v->requirePresence('name')->notEmptyString('name');
        $v->add('age', 'numeric', ['rule' => 'numeric']);
        return $v;
      }
    };

    $result = $model->patch([
      'name' => 'Alice',
      'age' => 30,
      'created' => '2020-01-02 03:04'
    ], false);

    $this->assertTrue($result, 'patch should return true for valid data');
    $this->assertSame('Alice', $model->name);
    $this->assertSame(30, $model->age);
    $this->assertInstanceOf(DateTime::class, $model->created);
    $this->assertSame('2020-01-02 03:04', $model->created->format('Y-m-d H:i'));
  }

  public function testPatchSkipsInvalidFieldsWhenRequested(): void
  {
    $model = new class() extends ModelBase {
      public string $name = 'Bob';
      public int $age = 10;

      protected function buildValidator(): Validator
      {
        $v = new Validator();
        $v->requirePresence('name')->notEmptyString('name');
        $v->add('age', 'numeric', ['rule' => 'numeric']);
        return $v;
      }
    };

    $result = $model->patch([
      'name' => '',
      'age' => 20
    ], true); // skip invalid

    $this->assertFalse($result, 'patch should return false when data has validation errors');
    // name was invalid and should be skipped, age should be updated
    $this->assertSame('Bob', $model->name);
    $this->assertSame(20, $model->age);
    $errors = $model->getAllErrors();
    $this->assertArrayHasKey('name', $errors);
  }

  public function testPatchAppliesInvalidFieldsWhenNotSkipping(): void
  {
    $model = new class() extends ModelBase {
      public string $name = 'Carol';
      public int $age = 5;

      protected function buildValidator(): Validator
      {
        $v = new Validator();
        $v->requirePresence('name')->notEmptyString('name');
        $v->add('age', 'numeric', ['rule' => 'numeric']);
        return $v;
      }
    };

    $result = $model->patch([
      'name' => '',
      'age' => 15
    ], false); // do not skip invalid

    $this->assertFalse($result, 'patch should return false when data has validation errors');
    // name was invalid but should be applied when skipInvalid is false
    $this->assertSame('', $model->name);
    $this->assertSame(15, $model->age);
  }
}

