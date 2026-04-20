<?php

require_once "Task.php";

class Project
{
    private $title;
    private $dailyRate;
    private $tasks = [];

    public function __construct($title, $dailyRate, $tasks)
    {
        $this->title = $title;
        $this->dailyRate = $dailyRate;
        $this->tasks = $tasks;
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function addTask(Task $task)
    {
        $this->tasks[] = $task;
    }

    public function calculateTotalHours()
    {
        // $totalHours = array_reduce($this->tasks, fn($sum, Task $task) => $sum + $task->getEstimatedHours(), 0);
        $totalHours = 0;
        foreach ($this->tasks as $task) {
            $totalHours += $task->getEstimatedHours();
        }
        return $totalHours;
    }

    public function calculateTotalWithBuffer($bufferPercent = 10)
    {
        $totalWithBuffer = $this->calculateTotalHours() * (1 + ($bufferPercent / 100));

        return ceil($totalWithBuffer);
    }

    public function calculateBudget()
    {
        $budget = $this->calculateTotalWithBuffer() * (($this->dailyRate / 8));
        return $budget;
    }

    public function getBigTasks($threshold)
    {
        $bigTasks = array_filter($this->tasks, fn($task) => $task->isBig($threshold));
        return $bigTasks;
    }

    public function getSummary()
    {
        echo "Title: $this->title\nDaily Rate: $this->dailyRate\nTasks: ";
        foreach ($this->tasks as $task) {
            $task->afficher();
        };
        echo "Total Estimated Hours: " . $this->calculateTotalHours() .
            "\nTotal Estimated Hours with Buffer of 10%: " . $this->calculateTotalWithBuffer() .
            "\nEstimated Budget: " . $this->calculateBudget();
    }

    public function getMostExpensiveTask()
    {
        $copy = [...$this->tasks];
        usort($copy, function ($a, $b) {
            return $b->getEstimatedHours() <=> $a->getEstimatedHours();
        });
        return $copy[0];
    }
}

$project = new Project("Refonte site web", 600, [new Task(1, "Design", 12), new Task(2, "Dev front", 30), new Task(3, "Dev back", 45)]);

print_r($project->calculateTotalHours());
echo "\n";
print_r($project->calculateTotalWithBuffer());
echo "\n";
print_r($project->calculateBudget());
echo "\n";
print_r($project->getBigTasks(20));
echo "\n";
print_r($project->getMostExpensiveTask());
$project->getSummary();
