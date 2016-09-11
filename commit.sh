git status
git add -A
git commit -m $(time)"update"
git tag -a $(date +%Y_%m_%d_%H) -m "package code on "$(date +%Y_%m_%d)
git pull origin master
git push origin master