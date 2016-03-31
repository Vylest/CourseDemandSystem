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
        DB::table('courses')->truncate();

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
        Course::create(['title' => 'Overview of System Development', 'number'=>'ISQA 8040']);
        Course::create(['title' => 'Data Organization and Storage', 'number'=>'ISQA 8050']);
        Course::create(['title' => 'Management of Software Development', 'number'=>'ISQA 8210']);
        Course::create(['title' => 'IT Project Fundamentals', 'number'=>'ISQA 8810']);
        Course::create(['title' => 'Project Risk Management', 'number'=>'ISQA 8820']);
        Course::create(['title' => 'Proc Re-Eng with IT', 'number'=>'8196']);
        Course::create(['title' => 'Advance System Analysis and Design', 'number'=>'ISQA 8220']);
        Course::create(['title' => 'Independent Research', 'number'=>'ISQA 8900']);
        Course::create(['title' => 'Thesis', 'number'=>'ISQA 8990']);
        Course::create(['title' => 'Managing the IS Function', 'number'=>'ISQA 8420']);
        Course::create(['title' => 'Application Regression Analysis', 'number'=>'ISQA 8340']);
        Course::create(['title' => 'Data Warehouse Theory', 'number'=>'ISQA 8700']);
        Course::create(['title' => 'Information/Data Quality Management', 'number'=>'ISQA 8206']);
        Course::create(['title' => 'Advance Stat Methods for IT', 'number'=>'ISQA 8156']);
        Course::create(['title' => 'Multivariate Data Analysis', 'number'=>'ISQA 9130']);
        Course::create(['title' => 'Business Forecasting', 'number'=>'ECON 8310']);
        Course::create(['title' => 'Business Intelligence', 'number'=>'ISQA 8016']);
        Course::create(['title' => 'Decision Support Systems', 'number'=>'ISQA 8736']);
        Course::create(['title' => 'Data Warehousing/Mining', 'number'=>'CSCI 8350']);
        Course::create(['title' => 'Seminar in MIS', 'number'=>'ISQA 8080']);
        Course::create(['title' => 'E-Commerce Security', 'number'=>'ISQA 8530']);
        Course::create(['title' => 'Database Management III', 'number'=>'ISQA 8410']);
        Course::create(['title' => 'Managing the Distributed Computer Environment', 'number'=>'ISQA 8380']);
        Course::create(['title' => 'MIS Capstone', 'number'=>'ISQA 8950']);
        Course::create(['title' => 'Graphical UI Design', 'number'=>'ISQA 8525']);
        Course::create(['title' => 'Information Security, Policy and Ethics', 'number'=>'ISQA 8570']);
        Course::create(['title' => 'Health Care Systems Overview', 'number'=>'PA 8760']);
        Course::create(['title' => 'Clinical System Architecture', 'number'=>'ISQA 8400']);
        Course::create(['title' => 'Readings Clinical Informatics', 'number'=>'ISQA 8500']);
        Course::create(['title' => 'Accounting Fundamentals', 'number'=>'BSAD 8110']);
        Course::create(['title' => 'Cartography & GIS', 'number'=>'GEOG 8535']);
    }
}
