*Welcome, and thank you for contributing to this project. Please take your time to study this document carefully before making any changes to the codebase, to ensure you're on the same page with the rest of the team and we can all collaborate seamlessly.*   

# Workflow
It is very important to follow the workflow defined here when pushing your changes to the repository to avoid messing up project files. This project's workflow is based on the [GitHub Flow](https://guides.github.com/introduction/flow/). More indepth git flow article [here](https://nvie.com/posts/a-successful-git-branching-model/).     
We will have smaller subteams based on the project requirements. We will also be creating branches based on these subteams to allow us work on various aspects of the project simultaneously.

## Branch Structure   
__'*develop*' - The Integration branch.__ This is the default branch. This is where features from the subteams are brought together. Subteams, submit your pull requests here, once your subteam branch is ready for integration. We will bring it all together in the integration phase.     
__'*master*' - The deployment branch.__ The code on this branch goes live to our hosting server and must be kept in pristine condition. When the integration (develop) branch reaches a milestone, the deployment (master) branch is updated via pull request.      
__Hotfix branches.__ If we find a bug in after deployment/integration and do not want to interrupt the works others are doing on newer features, a hotfix branch may be created off of *master* or *develop* as appropriate. Hotfix branch names are prefixed with "hf__". On completion, this branch is merged with *master*, and also with *develop* so the fixes are reflected in all future deployments.     
__Topic branches.__ This is usually Frontend & Backend but we may use a different structure depending on the project. When a milestone is reached, a pull request is made to the *develop* branch. Each subteam will have it's own topic branch.      
__Working branches.__ This is where initial work gets done. Any new features are broken down into tasks for each team member who does their work in a working branch that will be created for each person. The name of a working branch will correspond with the Slack display name of the person assigned to this task. Working branch names should begin with an "@" and all spaces should be replaced with a dash. Example: @Feranmi-Akinlade. When you finish working on your task, create a pull request to the appropriate topic branch.   

### Staying Updated
When working with teams on the same codebase, sometimes others make changes that affect your work. While great care has been taken to create a modular team workflow to keep this to a minimum, merge conflicts are inevitable. It would _suck_ to finish working on a task, only to find that the codebase has evolved and you need to rework everything to conform to the new changes. This is managed in two ways.       
__*First*__, discuss changes with the team beforehand. This is to ensure that you do not make changes that are in conflict with the work of others. GitHub has a handy feature for this - _[issues](https://help.github.com/en/articles/about-issues)_. [Create an issue](https://help.github.com/en/articles/creating-an-issue) and [label it](https://help.github.com/en/articles/applying-labels-to-issues-and-pull-requests). When you create an issue, it is automatically tracked on the team's [project board](https://help.github.com/en/articles/about-project-boards). Keep the issue open as long as work continues on the feature. All discussions regarding that feature are done under this issue. Your pull request is linked with the corresponding issue when work is completed, by adding "*closes #{number}*" to the pull request description on GitHub. Replace {number} with the appropriate issue number e.g _closes #5_.       
__*Second*__, each team member needs to make sure that at every given time, their working directory is up-to-date with the latest changes from the remote origin (online). **You should be able to do this easily with GitHub Desktop once you've configured the `upstream` remote. If you are using the command line, the following steps should help. `cd` into your project folder before running these commands.       

Make sure you have both the _origin_ and _upstream_ remotes set up.    
  <pre>git remote add origin git://github.com/{YOUR-GITHUB-USERNAME}/team-apollo-finance-tracker.git</pre>    
  <pre>git remote add upstream git://github.com/hngi/team-apollo-finance-tracker.git</pre>      
You will be pushing your work to 'origin' to back it up online. You will later create a pull request to the upstream repo.       
__*The following steps must be run periodically to keep your work up-to-date. You can run these commands as often as every hour. You want to fetch any new changes as soon as possible.*__       
Be sure to [stash](https://dev.to/neshaz/how-to-git-stash-your-work-the-correct-way-cna) 
or commit all local changes first.  

#### Pulling Upstream
0. Open a terminal and go into the directory for the newly cloned repo. Now add the upstream remote like so:        
    <pre>git remote add upstream git://github.com/TEAM-NAME/REPO-NAME.git</pre>    

Now you're all set up.       
__*The following steps must be run periodically to keep your work, and that of your entire sub-team up-to-date! You can run these commands as often as every hour. You want to fetch any new changes as soon as possible. Each time you want to begin working, or take a break from your work, run these first.*__

1. Switch to the develop branch        
    <pre>git checkout develop</pre>     
2. Get all remote (online) upstream changes into your local computer.        
    <pre>git fetch upstream</pre>     
3. Merge changes fetched with your local develop branch. ('develop' must be the currently checked-out branch)       
    <pre>git merge upstream/develop</pre>    
4. Push the newly merged changes to your fork's remote (online) repo. This is configured as 'origin' by default.    
    <pre>git push origin develop</pre>      

5. Switch to your feature branch.        
    <pre>git checkout ft__your-feature-name</pre>        
6. Now make sure your local feature branch is up-to-date with any work your group members have done.        
    ```
      git fetch origin       
      git merge origin/ft__your-feature-name
    ```
    *You may encounter merge conflicts here.
    [Resolve them](https://help.github.com/en/articles/resolving-a-merge-conflict-using-the-command-line),
    then come back and complete the merge. If you merge often enough, any conflicts would be trivial and very few.*

7. Merge the changes on the newly merged develop branch, into your feature branch.        
    <pre>git merge develop</pre>
    *You may encounter merge conflicts here.
    [Resolve them](https://help.github.com/en/articles/resolving-a-merge-conflict-using-the-command-line),
    then come back and complete the merge. If you merge often enough, any conflicts would be trivial and very few.*

8. Finally, push your newly merged feature branch to the remote github server so your group members can get updated as well.        
    <pre>git push origin ft__your-feature-name</pre>      
9. Now return to your working branch.        
    <pre>git checkout @your-slack-username</pre>      

Continue with the steps in the next section.

#### Pulling Origin
*Your group/sub-team lead has the responsibility of keeping your forked repo updated on the remote github server. All you need to do is get those changes unto your local computer.*       
Your local repository automatically has a remote 'origin' set up when you clone. This points to the online repository you cloned unto your system. You will be pushing your work to 'origin' to back it up online.       
__*The following steps must be run periodically to keep your work up-to-date. You can run these commands as often as every hour. You want to fetch any new changes as soon as possible. Each time you want to begin working, or take a break from your work, run these first.*__       
Be sure to 
[stash](https://dev.to/neshaz/how-to-git-stash-your-work-the-correct-way-cna) 
or commit all changes first.  

1. Switch to your subteam/topic branch        
    <pre>git checkout frontend</pre>          
2. Get all remote (online) changes from 'origin' into your local computer.        
    <pre>git fetch origin</pre>      
3. Merge changes fecthed with your local subteam branch. (The local subteam branch must be the currently checked-out branch. See step 1 above.)        
    <pre>git merge origin/frontend</pre>      
4. Next, switch to your working branch.        
    <pre>git checkout @your-slack-username</pre>      
5. Merge the changes on the newly merged subteam/topic branch, into your working branch. You may run 'git branch' to confirm which branch you're about to merge into.        
    <pre>git merge frontend</pre>
    *You may encounter merge conflicts here.
    [Resolve them](https://help.github.com/en/articles/resolving-a-merge-conflict-using-the-command-line),
    then come back and complete the merge. If you merge often enough, any conflicts would be trivial and very few.*       
6. Finally, push your newly merged working branch to the remote github server for back up.        
    <pre>git push origin @your-slack-user-name</pre>  
7. Once you're done with your task and you've pushed to github, head over to the github website and create a [pull request](https://help.github.com/en/articles/about-pull-requests) from your branch (the `compare` branch), to your subteam branch (the `base` branch).		    

