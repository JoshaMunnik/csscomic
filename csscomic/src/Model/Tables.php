<?php
/** @noinspection PhpFieldAssignmentTypeMismatchInspection */

/** @noinspection PhpIncompatibleReturnTypeInspection */

namespace App\Model;

#region traits

use App\Model\Table\LessonsTable;
use App\Model\Table\UsersTable;
use Cake\ORM\Locator\LocatorAwareTrait;

#endregion

#region private variables

/**
 * This class can be used to access the table instances. It uses lazy access, fetching the instance
 * the first time a table instance is accessed.
 */
class Tables
{
  #region traits

  use LocatorAwareTrait;

  #endregion

  #region private variables

  /**
   * Reference to singleton instance
   *
   * @var Tables|null
   */
  static ?Tables $s_instance = null;

  /**
   * Reference to singleton instance
   *
   * @var UsersTable|null
   */
  static ?UsersTable $s_users = null;

  /**
   * Reference to singleton instance
   *
   * @var LessonsTable|null
   */
  static ?LessonsTable $s_lessons = null;

  #endregion

  #region private function

  /**
   * Gets the singleton instance.
   *
   * @return Tables Singleton instance
   */
  private static function instance(): Tables
  {
    return self::$s_instance ?? self::$s_instance = new Tables();
  }

  #endregion

  #region constructor

  private function __constructor()
  {
  }

  #endregion

  #region public static methods

  public static function users(): UsersTable
  {
    return self::$s_users
      ?? self::$s_users = self::instance()->fetchTable(UsersTable::getDefaultAlias());
  }

  public static function lessons(): LessonsTable
  {
    return self::$s_lessons
      ?? self::$s_lessons = self::instance()->fetchTable(LessonsTable::getDefaultAlias());
  }

  #endregion
}
