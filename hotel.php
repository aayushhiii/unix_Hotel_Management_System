<?php
ans='y'
while [ $ans = 'y' ]
     do 
     clear 
     echo "--------------------------------------------------------------------------------------------------------------------------------------------------------"
     echo "                                                               Hotel Management System"
     echo " \t \t"                                                               
     echo "*********************************************************************************************************************************************************" 
     echo " \t\t                                                1. Guest Login"
     echo "*********************************************************************************************************************************************************"
     echo " \t\t                                                2. Hotel Login" 
     echo "********************************************************************************************************************************************************"
     
     echo " \t\t                                                3. Employee Login"
     echo "*********************************************************************************************************************************************************"
     echo " \t\t                                                4. Exit" 
     echo "*********************************************************************************************************************************************************"
   
     echo "Enter your Choice" 
     read ch 
     if [ $ch -eq 2 ] 
     then 
      clear 
      
   
stty -echo
printf "Password: "
read password
stty echo
printf "\n"
if grep -q $password pass.txt;
then
       
	
		ans1='y'
		while [ $ans1 = 'y' ]
		do 
	clear	
        echo "------------------------------------------------------------------------------------------------------------------------------------------------------"
        echo "                                                          Welcome to the Oberoi's " 
        echo "                                                                Hotel Admin "
	echo "\t \t"
        echo "*******************************************************************************************************************************************************"
      
	echo "\t \t                                         1. Remove Guest Record (Checked out) :"
	echo "********************************************************************************************************************************************************"
        echo "\t \t                                         2. Modify Guest info:"
	echo "********************************************************************************************************************************************************"
	echo "\t \t                                         3. Show Current Guest Record:"
	echo "********************************************************************************************************************************************************"
	echo "\t \t                                         4. Show Backup Information"
	echo "********************************************************************************************************************************************************"
	echo "\t \t                                         5. Display Guest's monthly booking"
	echo "********************************************************************************************************************************************************"
	echo "\t \t                                         6. Dislay Guest's info according to room"
	echo "*********************************************************************************************************************************************************"
	echo "\t \t                                         7. Know number of members accompanying "
	echo "********************************************************************************************************************************************************"
        echo "\t \t                                         8. Exit"
	echo "********************************************************************************************************************************************************" 
                 
	echo "enter your choice"
	read ch1
	if [ $ch1 -eq 1 ]
	then
		echo "********************************************************"
		echo "Do you wish to create backup before deleting a record (Y/N)"
		
		read ch_2
		if [ $ch_2 = 'Y' ]
		then 
                      cp hotel1_data.txt hotel1_back.txt
                      echo "Backup created successfully!!"
		fi
		echo "Enter Guest ID to delete"
		read gid
		grep -v $gid hotel1_data.txt >> hotel1_dup.txt
		rm hotel1_data.txt
		mv hotel1_dup.txt hotel1_data.txt
		echo "Guest info Deleted Successfully"
	elif [ $ch1 -eq 2 ]
	then 
		echo "enter GuestID to modify"
		read gid
		grep -v $gid hotel1_data.txt >> hotel1_dup.txt
		rm hotel1_data.txt
		mv hotel1_dup.txt hotel1_data.txt
		echo "*************************************************"
		echo "Enter Modified info"
		echo "**************************************************"
                
		echo "Enter Guest ID"
		read gid
		echo "Enter Guest first name"
		read gname
                echo "Enter Guest last name"
		read glname
		echo "Enter Guest age"
		read age
		echo "Enter arrival date"
		read adate
		echo "Enter arrival month"
		read amonth
		echo "Enter Departure date"
		read ddate
		echo "Enter Departure month"
		read dmonth
		echo "Enter Year"
		read year
                echo "Enter no. of members"
		read mem
		echo "Enter type of room applied for (Single/Double/Suite)"
		read room 
	        echo $gid"~"$gname"~"$glname"~"$age"~"$adate"~"$amonth"~"$ddate"~"$dmonth"~"$year"~"$mem"~"$room >> hotel1_data.txt 
		echo "Guest info modified successfully!!!"
	elif [ $ch1 -eq 3 ]
	then
		echo "**************************************************************************************"
		echo "Guest_ID---First_name----Last_name---Age----Arrival_date/Month----Departure_date/Month---Year----No_members----Type_room"
		echo "\t \t"
		echo "*************************************************************************************"
		cat hotel1_data.txt
                echo "**************************************************************************************"
	elif [ $ch1 -eq 4 ]
	then
		echo "*******************************************************************************************"
		 echo "Guest_ID---First_name----Last_name---Age----Arrival_date/Month----Departure_date/Month---Year----No_members----Type_room"
		 echo "\t \t"
		 echo "****************************************************************************************"
		cat hotel1_back.txt
                 echo "****************************************************************************************"
	elif [ $ch1 -eq 5 ]
	then 
	        echo "Enter arrival month"
		read amonth
                
		echo "Id-Firstname-Lastname-Age-Arrival_Date-Arrival_Month-Dep_date-Dep_month-Year-Amount-Room"
		echo "***************************************************************************************"
		grep $amonth hotel1_data.txt
		echo "****************************************************************************************"
	elif [ $ch1 -eq 6 ]
	then
             echo "****************************************************************"
		echo "Guest_id -------- Name ---------- Room_type"
		awk -F"~" '/single/ {print $1 " - " $2 " - " $11}' hotel1_data.txt
		echo "*************************************************************"
		echo "Guest_id -------- Name ----------- Room_type"
	        awk -F"~" '/double/ {print $1 " - " $2 " - " $11}' hotel1_data.txt
		echo "*************************************************************"
		echo "Guest_id --------- Name ---------- Room_type"
	
            	awk -F"~" '/suite/ {print $1 " - " $2 " - " $11}' hotel1_data.txt
		echo "*************************************************************"
          
	elif [ $ch1 -eq 7 ]
	then
           awk -F"~" -f mem.awk hotel1_data.txt
	   
   
	elif [ $ch1 -eq 8 ]
	then
		break
		
	fi
	echo "do you wish to continue(y/n)"
	read ans1
      done 
	 
      else
       
	      echo " Wrong Password "
	      continue
	
	
     fi
     
     elif [ $ch -eq 1 ]
     then 
     clear
    # echo " Enter password "
     #read pass_g
stty -echo
printf "Password: "
read pass_g
stty echo
printf "\n"
if grep -q $pass_g pass.txt;
then
     #if [ $pass_g -eq '123' ]
     #then 
             ans2='y'
	     while [ $ans2 = 'y' ]
	     do
	     clear
      echo "------------------------------------------------------------------------------------------------------------------------------------------------------"
      echo "\t \t                                                  Welcome to the Oberoi's"
      echo "                                                                      Guest user"
        echo "\t \t "
      echo "*****************************************************************************************************************************************************"
       
      echo "\t \t                                            1. Check Room availability and Book a room"
      echo "******************************************************************************************************************************************************"
      echo "\t \t                                            2. Know Booking Status"
      echo "*****************************************************************************************************************************************************"
      echo "\t \t                                            3. Generate your Bill"
      echo "******************************************************************************************************************************************************"
      echo "\t \t                                            4. Know type of room applied for"
      echo "******************************************************************************************************************************************************"
      echo "\t \t                                            5. Exit"
      echo "*******************************************************************************************************************************************************"
      
     
      
      echo "Enter your choice"
      read ch2
      if [ $ch2 -eq 1 ]
      then 
	      rooms=$(< "hotel1_data.txt" wc -l)
	      echo "*****************************"
              echo "Rooms Occupied ->" $rooms
	      tot_room=20
	      if [ $rooms -lt $tot_room ]
	      then 
		      echo "*********************************"
		      echo "Room available"
		      left=`expr $tot_room - $rooms`
		      echo "No. of room available -> " $left
		      echo "**********************************"
		      echo "Do you wish to Book a room (y/n)"
		      read book
		      if [ $book = 'y' ]
		      then
		           echo "***********************"
			   echo "Book A Room"
			   echo "**********************"
			        echo "enter Guest ID"
				 read gid
				 
				 echo "Enter Guest First Name"
			         read gname
				 echo "Enter Guest last name"
			         read glname
				echo "Enter Guest age"
				read age
			        echo "Enter arrival date"
			         read adate
			       echo "Enter arrival month"
			      read amonth
			        echo "Enter Departure date"
                                  read ddate
		        	echo "Enter Departure month"
				read dmonth
                                 
			 echo "Enter Year"
				read year
			echo "Enter no. of members"
			read mem
	                   echo "Enter type of room applied for (Single/Double/Suite)"
			        read room
                         echo $gid"~"$gname"~"$glname"~"$age"~"$adate"~"$amonth"~"$ddate"~"$dmonth"~"$year"~"$mem"~"$room >> hotel1_data.txt
		        cp hotel1_data.txt hotel1_back.txt
			 echo "Room Booked successfully!!!"		
								
		   else
			   continue
		      fi
	      else
		     echo "Rooms booked"
	      fi  
      elif [ $ch2 -eq 2 ]
      then
	      echo "Enter your Guest ID"
	      read gid
	      if grep -q $gid hotel1_data.txt; then
		      echo "********************************"
		 echo "Booking confirmed"
		 echo "*************************************"
	       else
		       echo "*******************************"
	          echo "Not Booked"
		  echo "************************************"
	      fi
	      
       elif [ $ch2 -eq 3 ]
       then
	      a=`date +%d-%m-%Y`
	      b=`date +%m-%d-%Y`
	      while [ 1 ] ; 
	      do
		   #   echo $a
		    #  echo $b
		      echo "enter arrival date"
		      read ad
		      echo "enter arrival month"
		      read am
		      echo "Enter departure Date(dd)"
			          read d
				  echo "enter departure month(mm)"
				  read m
				      if [ $m \< $b ] && [ $m \= $am ] ;
				     then
	
						
                                                     k=`expr $d - $ad`
						     p=300
						     m=`expr $k \* $p`
						     echo "**********************************"
						     echo "Your Total Bill is Rs."$m
						     echo "**********************************"
						 
				  
						 # grep $d hotel1_data.txt
				#awk -F"~" -f bill.awk hotel1_data.txt			 
	
							      break;
				      elif  [ $m \> $am ] && [ $m \< $b ];
						     then
				                  
                                                   
						   s=300
						   i=`expr $s - $ad`
						   d=`expr $i + $d`
						  # echo $i
						   j=`expr $d \* $s`	
						   echo "************************************"
						   echo "your total bill is Rs."$j
						   echo "************************************"
						    # grep $d hotel1_data.txt
                                                         break;
				else
					echo "********************************"
				echo "bill not yet generated"
				echo "*****************************************"
					
					break;
				      fi 
						      done 
elif [ $ch2 -eq 4 ]
		then 
			awk -F"~" -f room.awk hotel1_data.txt
	        elif [ $ch2 -eq 5 ]
		then
			break
	              # hotel1_data.txt | awk 'BEGIN { getline; print "Read ahead first line", $0 } {print $0 }'
      fi 
  
      echo "Do you wish to continue(y/n)"
      read ans2
      done
      else
      echo " Wrong Password"
      continue
     fi
       
     elif [ $ch -eq 3 ] 
     then
	   stty -echo
	   printf "Password: "
	   read pass_e
	   stty echo
	   printf "\n"
	   if grep -q $pass_e pass.txt;
	   then
		        #if [ $pass_g -eq '123' ]
			     #then
         ans3='y'
	 while [ $ans3 = 'y' ]
	  do
 clear
			
      echo "----------------------------------------------------------------------------------------------------------------------------------------------------"
         echo "                                                          Welcome to the Oberoi's"
	 echo "                                                             Employee Login" 
	 echo "\t \t "
	 echo "*************************************************************************************************************************************************"
	 echo "\t \t                                         1. Make an entry"
	 
	 echo "**************************************************************************************************************************************************"
	 echo "\t \t                                         2. Mark your attendance"
	 echo "**************************************************************************************************************************************************"
         echo "\t \t                                         3. Generate your salary"
	 echo "***************************************************************************************************************************************************"
	 echo "\t \t                                         4. Exit"
	 echo "***************************************************************************************************************************************************"
        
	 echo "Enter your choice"
	 read ch3
	 if [ $ch3 -eq 1 ]
	 then
		 echo " Enter Employee ID"
		 read e_id
		 echo "Enter your name"
		 read e_name
		 echo "Enter Service"
		 read e_service
		 echo "Enter shift (Morning/Evening)"
		 read e_shift
		 echo "Enter floor No. alloted"
		read e_floor
		echo "enter joining date"
		read e_date
		echo "enter joining month"
		read e_month
                 
		echo $e_id"~"$e_name"~"$e_service"~"$e_shift"~"$e_floor"~"$e_date"~"$e_month >> hotel1_emp.txt
		echo "Entry made successfully"
        elif [ $ch3 -eq 2 ]
	then
                echo "***************************"
		echo "Mark your attendance"
		echo "***************************"
		echo "enter Employee id"
		read e_id
		
		a=`date`
                echo "****************************************************************************"
		echo "Attendance marked successfully on date" $a
		echo "****************************************************************************"
		echo $e_id"~"$a >> hotel1_empatt.txt
	elif [ $ch3 -eq 3 ]
	then
		 a=`date +%d-%m-%Y`
	         #b=`date +%d`
                 echo "*****************************************"
		 echo "enter joining Month and date (Month/date)"
		 read e_date
		 #echo "enter joining month"
		 #read e_month
	     a=`date -d "$e_date" +%j`
	     #echo $a
	     b=`date -d "Apr 1" +%j`
	    # echo $b
	     # date -d "Apr 29" +%j
	     k=`expr $b - $a`
	    # echo $k
	    j=`expr $k \* 300`
	    echo "********************************************"
	    echo "The amount generated is= Rs." $j
	    echo "*********************************************"
    elif [ $ch3 -eq 4 ]
    then                
        break
	
     fi
           echo "Do you wish to continue(y/n)"
	         read ans3
	 done
	  else
	echo " Wrong Password"
	continue
        fi
     
     
     elif [ $ch -eq 4 ]
     then 
	     exit
     fi
 
     echo "Do you wish to go to login page (y/n)?"
     read ans
done 
echo "the end"
?>
