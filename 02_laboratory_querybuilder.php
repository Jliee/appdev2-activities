<?php

/* Task 1: Retrieve all students.
SELECT * FROM students; */

    DB::table('students')
    ->get();

/* TASK 2: Retrieve students in a specific grade.
SELECT * FROM students WHERE grade = '10'; */

    DB::table('students')
    ->where('grade', '10')
    ->get();

/* TASK 3:Retrieve students with a specific age range.
*SELECT * FROM students WHERE age BETWEEN 15 AND 18;*/

    DB::table('students')
    ->whereBetween('age', [15, 18])
    ->get();

/* TASK 4: Retrieve students from a specific city.
SELECT * FROM students WHERE city = 'Manila';*/

    DB::table('students')
    ->WHERE('city', 'Manila')
    ->get();

/* TASK 5: Retrieve students sorted by their age in descending order.
SELECT * FROM students ORDER BY age DESC; */

    DB::table('students')
    ->orderBy('age', 'DESC')
    ->get();

/* TASK 6:Retrieve students with their corresponding teacher.
SELECT students.*, teachers.name AS teacher_name 
FROM students 
LEFT JOIN teachers ON students.teacher_id = teachers.id;
 */

    DB::table('students')
    ->leftJoin('teachers','students.teacher_id', '=', 'teachers.id')
    ->select('students.*', 'teachers.name AS teacher_name')
    ->get();

/*TASK 7:Retrieve teachers along with the number of students they teach.
 SELECT teachers.*, COUNT(students.id) AS student_count 
FROM teachers 
LEFT JOIN students ON teachers.id = students.teacher_id 
GROUP BY teachers.id; */


    DB::table('teachers')
    ->leftJoin('students', 'teachers.id', '=', 'students.teacher_id')
    ->selectRaw('teachers.*, COUNT(students.id) AS student_count') 
    ->groupBy('teachers.id')  
    ->get();

/*TASK 8: Retrieve students with their corresponding subjects.
 SELECT students.*, subjects.name AS subject_name 
FROM students 
INNER JOIN subjects ON students.subject_id = subjects.id; */

    DB::table('students')
    ->join('subjects','students.subject_id', '=','subjects.id')
    ->select('students.*','subjects.name AS subject_name')
    ->get();

/*TASK 9: Retrieve students along with their average scores.
SELECT students.*, AVG(scores.score) AS average_score 
FROM students 
LEFT JOIN scores ON students.id = scores.student_id 
GROUP BY students.id;
 */

    DB::table('students')
    ->leftJoin('scores','students.id', '=','scores.student_id')
    ->selectRaw('students.*, AVG(scores.score) AS average_score')
    ->groupBy('students.id')
    ->get();

/*TASK 10: Retrieve top 5 teachers with the highest number of students.
SELECT teachers.*, COUNT(students.id) AS student_count 
FROM teachers 
LEFT JOIN students ON teachers.id = students.teacher_id 
GROUP BY teachers.id 
ORDER BY student_count DESC 
LIMIT 5; 
*/

    DB::table('teachers')
    ->leftJoin('students', 'teachers.id', '=','students.teacher_id')
    ->selectRaw('teachers.*, COUNT(students.id) AS student_count')
    ->groupBy('teachers.id')
    ->orderBy('student_count', 'DESC')
    ->limit(5)
    ->get();
?>

    