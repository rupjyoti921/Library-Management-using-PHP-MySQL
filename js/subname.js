
    $(document).ready(function () {
    $("#department").change(function () {
        var vald = $(this).val();
if(vald == "cse" || vald=="ee" || vald=="pt" || vald=="others" || vald=="sc" || vald=="hu" || vald=="wo")
              { $("#semester").html("<option value=''>-- Select a Semester --</option>                <option value='1st'>1st</option>   <option value='2nd'>2nd</option>                     <option value='3rd'>3rd</option>   <option value='4th'>4th</option>                     <option value='5th'>5th</option>   <option value='6th'>6th</option>                      <option value='others'>Others</option>");}
       
       
        
        $("#semester").change(function () {
        var vals = $(this).val();
        if (vald == "cse"){
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='ed'>Engineering Drawing</option>                                               <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='emt'>Engineering Mechanics Theory</option>                               <option value='emp'>Engineering Mechanics Practical</option>                                 <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='capt'>Computer Application and Programming Theory</option>               <option value='capp'>Computer Application and Programming Practical </option>                 <option value='cao'>Computer Architecture & Organisation</option>                        <option value='eeet'>Elements of Electrical Engineering Theory</option>                  <option value='eeep'>Elements of Electrical Engineering Practical</option>               <option value='eomt'>Elements of Multimedia Theory</option>                              <option value='eomp'>Elements of Multimedia Practical</option>                          <option value='others'>Others</option>");}
              else if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='dst'>Data Structure Theory</option>                                       <option value='dsp'>Data Structure Practical </option>                                   <option value='sp'>System Programming</option>                                          <option value='mpt'>Microprocessor And Interfacing Theory</option>                            <option value='mpp'>Microprocessor And Interfacing Practical</option>                        <option value='acncct'>Advanced C and C++ Theory</option>                                 <option value='acnccp'>Advanced C and C++ Practical</option>                             <option value='chnt'>Computer Hardware and Networking Theory</option>                      <option value='chnp'>Computer Hardware and Networking Practical</option>                      <option value='det'>Digital Electronics Theory</option>                                      <option value='dep'>Digital Electronics Practical</option>                                    <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='iwtt'>Internet & WebTechnology Theory</option>                           <option value='iwtp'>Internet & WebTechnology Practical</option>                           <option value='ccn'>Computer Communication & Networking</option>                              <option value='dbmst'>Database Management Systems Theory</option>                            <option value='dbmsp'>Database Management Systems Practical</option>                        <option value='ost'>Operating System Theory</option>                                     <option value='osp'>Operating System Practical</option>                                 <option value='javat'>JAVA Programming Theory</option>                                  <option value='javap'>JAVA Programming Practical</option>                                   <option value='vpt'>Visual Programming Theory</option>                                  <option value='vpp'>Visual Programming Practical</option>                                    <option value='vlsi'>VLSI & Embedded System</option>                                     <option value='others'>Others</option>");}
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='mct'>Mobile Computing Theory </option>                                    <option value='mcp'>Mobile Computing Practical</option>                                 <option value='cnst'>Crytography and Network Security Theory</option>                        <option value='cnsp'>Crytography and Network Security Practical</option>                      <option value='se'>Software Engineering</option>                                         <option value='pp'>Parallel Processing</option>                                          <option value='gt'>Graph Theory & Combinatorics</option>                                 <option value='ai'>Artificial Intelligence</option>                                     <option value='others'>Others</option>");}
              
              
                         }
        
        else if (vald == "ee") {
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='ed'>Engineering Drawing</option>                                               <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='emt'>Engineering Mechanics Theory</option>                               <option value='emp'>Engineering Mechanics Practical</option>                                  <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                  <option value='capt'>Computer Application and Programming Theory</option>               <option value='capp'>Computer Application and Programming Practical </option>                 <option value='eedt'>Elements of electronics and Devices Theory</option>                      <option value='eedp'>Elements of electronics and Devices Practical</option>                  <option value='peet'>Principles of Electrical engineering Theory</option>                    <option value='peep'>Principles of Electrical engineering Practical</option>                  <option value='emet'>Elements of mechanical engineering Theory</option>                      <option value='emep'>Elements of mechanical engineering Practical</option>                    <option value='feeet'>Fundamentals of electrical and electronics engg Theory</option>        <option value='feeep'>Fundamentals of electrical and electronics engg Practical</option>      <option value='others'>Others</option>");}
              if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                   <option value='ecnt'>Electrical Circuit and Network Theory</option>                          <option value='ecnp'>Electrical Circuit and Network Practical</option>                        <option value='eedd'>Electrical and Electronics drawing and design</option>                  <option value='emmi1t'>Electrical measurement and measuring instruments-I Theory</option>    <option value='emmi1p'>Electrical measurement and measuring instruments-I Practical</option> <option value='eme1t'>Electrical Machine-I Theory</option>                                    <option value='eme1p'>Electrical Machine-I Practical</option>                               <option value='eem'>Electrical Engineering material</option>                                  <option value='de'>Digital electronics</option>                                         <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                   <option value='ept'>Electrical Power Theory</option>                                          <option value='epp'>Electrical Power Practical</option>                                    <option value='emmi2t'>Electrical measurement and measuring instruments-II Theory</option>    <option value='emmi2p'>Electrical measurement and measuring instruments-II Practical</option> <option value='eme2t'>Electrical Machine-II Theory</option>                                   <option value='eme2p'>Electrical Machine-II Practical</option>                               <option value='nces'>Non-conventional energy sources</option>                                 <option value='mpt'>Microprocessor Theory</option>                                      <option value='mpp'>Microprocessor Practical</option>                                   <option value='cs'>Control system</option>                                                  <option value='pe'>Power electronics</option>                                              <option value='others'>Others</option>"); }
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='eecct'>Electrical estimating, costing and contracting Theory </option>         <option value='eeccp'>Electrical estimating, costing and contracting Practical </option>     <option value='acdu'>A.C Distribution & Utilization</option>                            <option value='sgp'>Switchgear and Protection</option>                                  <option value='im'>Installation and Maintenance</option>                                      <option value='others'>Others</option>"); }
                               }
            
            
                    
            else if (vald == "pt") {
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='ed'>Engineering Drawing</option>                                                <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='emt'>Engineering Mechanics Theory</option>                               <option value='emp'>Engineering Mechanics Practical</option>                                 <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                  <option value='capt'>Computer Application and Programming Theory</option>               <option value='capp'>Computer Application and Programming Practical </option>                 <option value='eeet'>Elements of Electrical Engineering Theory</option>                       <option value='eeep'>Elements of Electrical Engineering Practical</option>                   <option value='eeset'>Elements of Electronics Engineering Theory</option>                   <option value='eesep'>Elements of Electronics Engineering Practical</option>                  <option value='ppt'>Printing Process Theory</option>                                    <option value='ppp'>Printing Process Practical</option>                                 <option value='pr'>Prepress Reprotechnique</option>                                         <option value='others'>Others</option>");}
              if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                   <option value='vddtpt'>Visual Design & DTP Theory</option>                                    <option value='vddtpp'>Visual Design & DTP Practical</option>                                 <option value='ipt'>Image Processing Theory</option>                                    <option value='ipp'>Image Processing Practical</option>                                   <option value='pms1'>Printers Material Science-I</option>                                 <option value='gfsp'>Gravure Flexoghaphe & Screen Printing</option>                           <option value='tct'>Typesetting & Composition Theory</option>                               <option value='tcp'>Typesetting & Composition Practical</option>                              <option value='tmt'>Theory of Machines Theory</option>                                        <option value='tmp'>Theory of Machines Practical</option>                               <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                   <option value='dpt'>Digital Prepress Theory</option>                                          <option value='dpp'>Digital Prepress Practical</option>                                     <option value='optt'>Offset Printing Technology Theory</option>                         <option value='optp'>Offset Printing Technology Practical</option>                      <option value='pms2'>Printers Material Science-II</option>                                   <option value='pgpt1t'>Plano graphic Painting Technique -I Theory</option>                   <option value='pgpt1p'>Plano graphic Painting Technique -I Practical</option>                 <option value='pwt'>Press Work Theory</option>                                          <option value='pwp'>Press Work Practical</option>                                          <option value='pmm'>Printing Machine Maintenance</option>                                      <option value='others'>Others</option>"); }
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='bft'>Binding and Finishing Theory </option>                              <option value='bfp'>Binding and Finishing Practical </option>                            <option value='ec'>Estimating and Costing</option>                                       <option value='pgpt2'>Plano graphic Painting Technique -II </option>                          <option value='mat'>Machine Theory</option>                                               <option value='map'>Machine Practical</option>                                               <option value='supt'>Surface Preparation Theory</option>                                      <option value='supp'>Surface Preparation Practical</option>                                   <option value='gdt'>Graphic Design Theory</option>                                            <option value='gdp'>Graphic Design Practical</option>                                   <option value='others'>Others</option>"); }
                               }
            
            
             else if (vald == "sc") {
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='mathematics1'>Mathematics-I </option>                                     <option value='physics1t'>Applied Physics-I Theory</option>                             <option value='physics1p'>Applied Physics-I Practical</option>                           <option value='chemistry1t'>Chemistry-I Theory</option>                                 <option value='chemistry1p'>Chemistry-I Practical</option>                                    <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='mathematics2'>Mathematics-II </option>                                   <option value='physics2t'>Applied Physics-II Theory</option>                            <option value= 'physics2p'> Applied Physics-II Practical</option>                        <option value='chemistry2t'>Chemistry-II Theory</option>                                <option value='chemistry2p'>Chemistry-II Practical</option>                                   <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='mathematics3'> Mathematics-III</option>                                   <option value='others'>Others</option>");}
              if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='others'>Others</option>"); }
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='others'>Others</option>"); }
                               }
            
            
            else if (vald == "hu") {
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                  <option value='english1'>English-I</option>                                                    <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                  <option value='english2'>English-II</option>                                                  <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='eea'>Engineering Economics & Accountancy</option>                              <option value='others'>Others</option>");}
              if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='others'>Others</option>"); }
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                   <option value='ime'>Industrial Management & Entrepreneurship</option>                         <option value='others'>Others</option>"); }
                               }
            
             else if (vald == "wo") {
              if(vals == "1st")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='bwp1'>Basic Workshop Practice-I</option>                                 <option value='others'>Others</option>");}
              else if(vals == "2nd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='bwp2'>Basic Workshop Practice-II</option>                                  <option value='others'>Others</option>");}
              else if(vals == "3rd")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='others'>Others</option>");}
              if(vals == "4th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='others'>Others</option>");}
              else if(vals == "5th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                       <option value='others'>Others</option>"); }
              else if(vals == "6th")
              { $("#subject").html("<option value=''>-- Select a Subject --</option>                        <option value='others'>Others</option>"); }
                               }
            
            
     });
        
        
  });
});
