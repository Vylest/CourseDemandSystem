<?php

use Illuminate\Database\Seeder;

use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['title' => 'Composition I', 'number'=>'ENGL 1150']);
        Course::create(['title' => 'Composition II', 'number'=>'ENGL 1160']);
        Course::create(['title' => 'Advance Composition for IS&T', 'number'=>'CIST 3000']);
        Course::create(['title' => 'Public Speaking', 'number'=>'CMST 1110']);
        Course::create(['title' => 'Debate', 'number'=>'CMST 2120']);
        Course::create(['title' => 'IT Ethics', 'number'=>'CIST 3110']);
        Course::create(['title' => 'Organizations, Applications, and Technology', 'number'=>'CIST 2100']);
        Course::create(['title' => 'Microeconomics', 'number'=>'ECON 2200']);
        Course::create(['title' => 'Macroeconomics', 'number'=>'ECON 2220']);
        Course::create(['title' => 'Managing in a Digital World', 'number'=>'ISQA 3420']);
        Course::create(['title' => 'Intro to Information Security', 'number'=>'IASC 1100']);
        Course::create(['title' => 'Intro to Web Development', 'number'=>'CIST 1300']);
        Course::create(['title' => 'Intro to Computer Programming', 'number'=>'CIST 1400']);
        Course::create(['title' => 'Intro to Computer Programming (Lab)', 'number'=>'CIST 1404']);
        Course::create(['title' => 'Intro to Computer Science II', 'number'=>'CSCI 1620']);
        Course::create(['title' => 'Intro to Applied Statistics', 'number'=>'CIST 2500']);
        Course::create(['title' => 'Calculus for Management, Life, and Social Sciences', 'number'=>'MATH 1930']);
        Course::create(['title' => 'Discrete Math', 'number'=>'MATH 2030']);
        Course::create(['title' => 'Principles of Accounting I', 'number'=>'ACCT 2010']);
        Course::create(['title' => 'Principles of Accounting II', 'number'=>'ACCT 2020']);
        Course::create(['title' => 'Accounting Information Systems', 'number'=>'ACCT 3080']);
        Course::create(['title' => 'Microeconomic Theory', 'number'=>'ECON 3200']);
        Course::create(['title' => 'Macroeconomic Theory', 'number'=>'ECON 3220']);
        Course::create(['title' => 'Principles of Financial Management', 'number'=>'FNBK 3250']);
        Course::create(['title' => 'Human Resource Management', 'number'=>'MGMT 3510']);
        Course::create(['title' => 'Entrepreneurial Foundations', 'number'=>'MGMT 3710']);
        Course::create(['title' => 'Principles of Collaboration', 'number'=>'MGMT 4090']);
        Course::create(['title' => 'Principles of Marketing', 'number'=>'MRKT 3310']);
        Course::create(['title' => 'File Stuctures', 'number'=>'ISQA 3300']);
        Course::create(['title' => 'Managing the Database Environment', 'number'=>'ISQA 3310']);
        Course::create(['title' => 'Business Data Communications', 'number'=>'ISQA 3420']);
        Course::create(['title' => 'Intro to Project Management', 'number'=>'ISQA 3910']);
        Course::create(['title' => 'Information Systems Analysis', 'number'=>'ISQA 4110']);
        Course::create(['title' => 'System Design and Implementation', 'number'=>'ISQA 4120']);

    }
}
