@ECHO OFF
TITLE Cim V3.0
REM Cimply.Work for PHP CLI
REM 
REM PHP use versions 5.x >= 7.x
REM 
REM  @category PHP
REM  @package  Cimply.Work CLI Console
REM  @author   Michael Eckebrecht <direkt@route-media.info>
REM  @license  http://www.opensource.org/licenses/bsd-license.php  BSD
REM  @version  CVS: $Id: cimply.work,v 3.0a 2018/02/27 23:51:59 farell Exp $
REM  @link     http://cimply.work
REM  @access   public

if "%PHPBIN%" == "" set PHPBIN=C:\xampp\php\php.exe
"%PHPBIN%" -f ".\cim\cim.php" %*
pause