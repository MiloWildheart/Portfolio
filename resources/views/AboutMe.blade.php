<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resume</title>

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }

  #container {
    max-width: 75%;
    margin: 50px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
  }

  .section {
    flex-basis: 22%;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    margin: 100px 0 10px 20px;
    max-height: 300px;
  }

  .picture {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #ccc;
    margin-top: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
  }

  .title {
  text-align: center;
  font-size: 20px;
  margin-bottom: 10px;
  position: relative; /* Added */
}

.title::after {
  content: '';
  position: absolute;
  bottom: -5px; /* Adjust as needed */
  left: 50%;
  transform: translateX(-50%);
  width: 80%; /* Adjust width as needed */
  height: 1px;
  background-color: #000;
}

  .skills,
  .knowledge {
    height: 200px; /* Adjust as needed */
    overflow-y: auto;
    .range {
  position: relative;
  background-color: #333;
  width: 300px;
  height: 30px;
  transform: skew(30deg);
  font-family: 'Orbitron', monospace;
}

  }
</style>
</head>
<body>
<x-scroll-bar></x-scroll-bar>

<div id="container">
  <div class="section">
    <!-- TODO: Change this to Skills -->
    <div class="title">Skills</div>
    <div class="skills">
    @foreach ($relevantKnowledge as $data )
       <x-progress-bar :$data ></x-progress-bar>
     @endforeach
    </div>
  </div>

  <div class="section">
    <div class="title">Robin Knol</div>
    <div class="picture"></div>
    
  </div>

  <div class="section">
    <div class="title">Knowledge</div>
    <div class="knowledge">
    @foreach ($relevantKnowledge as $data )
       <x-progress-bar :$data ></x-progress-bar>
     @endforeach
    </div>
  </div>
<!-- i want a div under this for my personal story, the width should be just a wide as these 3 divs-->

</div>
<x-divider>ERVARING</x-divider>
<x-work-carousel data-source="work-experience" :data="$workExperience"></x-work-carousel>
<x-divider>PROJECEN</x-divider>
<x-work-carousel data-source="work-experience" :data="$workExperience"></x-work-carousel>
<div>
<x-footer></x-footer></div>
</body>
</html>
